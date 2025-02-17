<?php

/*
<COPYRIGHT>

    Copyright © 2016-2025, Canyon GBS LLC. All rights reserved.

    Advising App™ is licensed under the Elastic License 2.0. For more details,
    see https://github.com/canyongbs/advisingapp/blob/main/LICENSE.

    Notice:

    - You may not provide the software to third parties as a hosted or managed
      service, where the service provides users with access to any substantial set of
      the features or functionality of the software.
    - You may not move, change, disable, or circumvent the license key functionality
      in the software, and you may not remove or obscure any functionality in the
      software that is protected by the license key.
    - You may not alter, remove, or obscure any licensing, copyright, or other notices
      of the licensor in the software. Any use of the licensor’s trademarks is subject
      to applicable law.
    - Canyon GBS LLC respects the intellectual property rights of others and expects the
      same in return. Canyon GBS™ and Advising App™ are registered trademarks of
      Canyon GBS LLC, and we are committed to enforcing and protecting our trademarks
      vigorously.
    - The software solution, including services, infrastructure, and code, is offered as a
      Software as a Service (SaaS) by Canyon GBS LLC.
    - Use of this software implies agreement to the license terms and conditions as stated
      in the Elastic License 2.0.

    For more information or inquiries please visit our website at
    https://www.canyongbs.com or contact us via email at legal@canyongbs.com.

</COPYRIGHT>
*/

use AdvisingApp\Alert\Enums\SystemAlertStatusClassification;
use AdvisingApp\Alert\Models\Alert;
use AdvisingApp\Alert\Models\AlertStatus;
use AdvisingApp\Authorization\Enums\LicenseType;
use AdvisingApp\Notification\Models\Subscription;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\ListProspects;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectSource;
use AdvisingApp\Prospect\Models\ProspectStatus;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function Tests\asSuperAdmin;

// TODO: Write ListProspects page test
//test('The correct details are displayed on the ListProspects page', function () {});

// TODO: Sorting and Searching tests

// Permission Tests

test('ListProspects is gated with proper access control', function () {
    $user = User::factory()->licensed(Prospect::getLicenseType())->create();

    actingAs($user)
        ->get(
            ProspectResource::getUrl('index')
        )->assertForbidden();

    $user->givePermissionTo('prospect.view-any');

    actingAs($user)
        ->get(
            ProspectResource::getUrl('index')
        )->assertSuccessful();
});

test('ListProspects can bulk update characteristics', function () {
    $user = User::factory()->licensed(Prospect::getLicenseType())->create();

    $user->givePermissionTo('prospect.view-any');

    actingAs($user);

    $prospects = Prospect::factory()->count(3)->create();

    $component = livewire(ListProspects::class);

    $component->assertCanSeeTableRecords($prospects)
        ->assertCountTableRecords($prospects->count())
        ->assertTableBulkActionExists('bulk_update');

    $source = ProspectSource::factory()->create();

    $status = ProspectStatus::factory()->create();

    $description = 'abc123';
    $hsgrad = '2000';

    $component
        ->callTableBulkAction('bulk_update', $prospects, [
            'field' => 'description',
            'description' => $description,
        ])
        ->assertHasNoTableBulkActionErrors()
        ->callTableBulkAction('bulk_update', $prospects, [
            'field' => 'email_bounce',
            'email_bounce' => true,
        ])
        ->assertHasNoTableBulkActionErrors()
        ->callTableBulkAction('bulk_update', $prospects, [
            'field' => 'hsgrad',
            'hsgrad' => $hsgrad,
        ])
        ->assertHasNoTableBulkActionErrors()
        ->callTableBulkAction('bulk_update', $prospects, [
            'field' => 'sms_opt_out',
            'sms_opt_out' => true,
        ])
        ->assertHasNoTableBulkActionErrors()
        ->callTableBulkAction('bulk_update', $prospects, [
            'field' => 'source_id',
            'source_id' => $source->id,
        ])
        ->assertHasNoTableBulkActionErrors()
        ->callTableBulkAction('bulk_update', $prospects, [
            'field' => 'status_id',
            'status_id' => $status->id,
        ])
        ->assertHasNoTableBulkActionErrors();

    expect($prospects)
        ->each(
            fn ($prospect) => $prospect
                ->refresh()
                ->description->toBe($description)
                ->email_bounce->toBeTrue()
                ->hsgrad->toBe($hsgrad)
                ->sms_opt_out->toBeTrue()
                ->source_id->toBe($source->id)
                ->status_id->toBe($status->id)
        );
});

it('can filter prospects by `subscribed` prospects', function () {
    $user = User::factory()->licensed(LicenseType::cases())->create();

    $user->givePermissionTo('prospect.view-any');
    $user->givePermissionTo('subscription.view-any');
    $user->givePermissionTo('subscription.*.view');

    actingAs($user);

    $subscribedProspects = Prospect::factory()
        ->count(3)
        ->has(
            Subscription::factory()->state(['user_id' => $user->getKey()]),
            'subscriptions'
        )
        ->create();

    $notSubscribedProspects = Prospect::factory()->count(3)->create();

    livewire(ListProspects::class)
        ->set('tableRecordsPerPage', 10)
        ->assertCanSeeTableRecords($notSubscribedProspects->merge($subscribedProspects))
        ->filterTable('subscribed')
        ->assertCanSeeTableRecords($subscribedProspects)
        ->assertCanNotSeeTableRecords($notSubscribedProspects);
});
it('can filter prospect by alerts', function () {
    asSuperAdmin();

    $activeStatusAlert = AlertStatus::factory()
        ->state([
            'name' => 'Active',
            'classification' => SystemAlertStatusClassification::Active,
        ])
        ->create();

    $inprogressStatusAlert = AlertStatus::factory()
        ->state([
            'name' => 'InProgress',
            'classification' => SystemAlertStatusClassification::Active,
        ])
        ->create();

    $prospectWithStatusActive = Prospect::factory()->create();

    $prospectWithStatusInprogress = Prospect::factory()->create();

    $activeAlerts = Alert::factory()
        ->count(3)
        ->for($prospectWithStatusActive, 'concern')
        ->state([
            'status_id' => $activeStatusAlert->getKey(),
        ])
        ->create();

    $inProgressAlerts = Alert::factory()
        ->count(2)
        ->for($prospectWithStatusInprogress, 'concern')
        ->state([
            'status_id' => $inprogressStatusAlert->getKey(),
        ])
        ->create();

    $prospectsWithoutAlerts = Prospect::factory()->count(5)->create();

    livewire(ListProspects::class)
        ->set('tableRecordsPerPage', 10)
        ->assertCanSeeTableRecords($prospectsWithoutAlerts->merge([$prospectWithStatusActive, $prospectWithStatusInprogress]))
        ->filterTable('alerts', [$activeStatusAlert, $inprogressStatusAlert])
        ->assertCanSeeTableRecords([$prospectWithStatusActive, $prospectWithStatusInprogress])
        ->assertCanNotSeeTableRecords($prospectsWithoutAlerts)
        ->resetTableFilters()
        ->filterTable('alerts', [$activeStatusAlert])
        ->assertCanSeeTableRecords([$prospectWithStatusActive])
        ->assertCanNotSeeTableRecords($prospectsWithoutAlerts->merge([$prospectWithStatusInprogress]))
        ->removeTableFilter('alerts')
        ->assertCanSeeTableRecords($prospectsWithoutAlerts->merge([$prospectWithStatusActive, $prospectWithStatusInprogress]));
});
