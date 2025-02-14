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

use AdvisingApp\Authorization\Enums\LicenseType;
use AdvisingApp\CaseManagement\Filament\Resources\CaseUpdateResource;
use AdvisingApp\CaseManagement\Filament\Resources\CaseUpdateResource\Pages\CreateCaseUpdate;
use AdvisingApp\CaseManagement\Models\CaseUpdate;
use AdvisingApp\CaseManagement\Tests\Tenant\RequestFactories\CreateCaseUpdateRequestFactory;
use AdvisingApp\Notification\Events\TriggeredAutoSubscription;
use App\Models\User;
use App\Settings\LicenseSettings;
use Illuminate\Support\Facades\Event;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEmpty;
use function Tests\asSuperAdmin;

test('A successful action on the CreateCaseUpdate page', function () {
    // Because we create a Case there is already a Subscription created.
    // This causes an issue during SubscriptionCreate as a unique constraint is violated.
    // Postgres prevents any further actions from happening during a transaction when there is an error like this
    // Preventing the Subscription creation for now
    Event::fake([TriggeredAutoSubscription::class]);

    asSuperAdmin()
        ->get(
            CaseUpdateResource::getUrl('create')
        )
        ->assertSuccessful();

    $request = collect(CreateCaseUpdateRequestFactory::new()->create());

    livewire(CreateCaseUpdate::class)
        ->fillForm($request->toArray())
        ->call('create')
        ->assertHasNoFormErrors();

    assertCount(1, CaseUpdate::all());

    assertDatabaseHas(CaseUpdate::class, $request->except('case_model_id')->toArray());

    expect(CaseUpdate::first()->case->id)
        ->toEqual($request->get('case_model_id'));
});

// test('CreateCaseUpdate requires valid data', function ($data, $errors) {
//     asSuperAdmin();

//     livewire(CreateCaseUpdate::class)
//         ->fillForm(CreateCaseUpdateRequestFactory::new($data)->create())
//         ->call('create')
//         ->assertHasFormErrors($errors);

//     assertEmpty(CaseUpdate::all());
// })->with(
//     [
//         'case missing' => [CreateCaseUpdateRequestFactory::new()->without('case_model_id'), ['case_model_id' => 'required']],
//         'case not existing case id' => [CreateCaseUpdateRequestFactory::new()->state(['case_model_id' => fake()->uuid()]), ['case_model_id' => 'exists']],
//         'update missing' => [CreateCaseUpdateRequestFactory::new()->without('update'), ['update' => 'required']],
//         'update is not a string' => [CreateCaseUpdateRequestFactory::new()->state(['update' => 99]), ['update' => 'string']],
//         'direction missing' => [CreateCaseUpdateRequestFactory::new()->state(['direction' => null]), ['direction' => 'required']],
//         'internal not a boolean' => [CreateCaseUpdateRequestFactory::new()->state(['internal' => 'invalid']), ['internal' => 'boolean']],
//     ]
// );

// Permission Tests

test('CreateCaseUpdate is gated with proper access control', function () {
    // Because we create a Case there is already a Subscription created.
    // This causes an issue during SubscriptionCreate as a unique constraint is violated.
    // Postgres prevents any further actions from happening during a transaction when there is an error like this
    // Preventing the Subscription creation for now
    Event::fake([TriggeredAutoSubscription::class]);

    $user = User::factory()->licensed(LicenseType::cases())->create();

    actingAs($user)
        ->get(
            CaseUpdateResource::getUrl('create')
        )->assertForbidden();

    livewire(CreateCaseUpdate::class)
        ->assertForbidden();

    $user->givePermissionTo('case_update.view-any');
    $user->givePermissionTo('case_update.create');

    actingAs($user)
        ->get(
            CaseUpdateResource::getUrl('create')
        )->assertSuccessful();

    $request = collect(CreateCaseUpdateRequestFactory::new()->create());

    livewire(CreateCaseUpdate::class)
        ->fillForm($request->toArray())
        ->call('create')
        ->assertHasNoFormErrors();

    assertCount(1, CaseUpdate::all());

    assertDatabaseHas(CaseUpdate::class, $request->toArray());
});

test('CreateCaseUpdate is gated with proper feature access control', function () {
    $settings = app(LicenseSettings::class);

    $settings->data->addons->caseManagement = false;

    $settings->save();

    $user = User::factory()->licensed(LicenseType::cases())->create();

    $user->givePermissionTo('case_update.view-any');
    $user->givePermissionTo('case_update.create');

    actingAs($user)
        ->get(
            CaseUpdateResource::getUrl('create')
        )->assertForbidden();

    livewire(CreateCaseUpdate::class)
        ->assertForbidden();

    $settings->data->addons->caseManagement = true;

    $settings->save();

    actingAs($user)
        ->get(
            CaseUpdateResource::getUrl('create')
        )->assertSuccessful();

    $request = collect(CreateCaseUpdateRequestFactory::new()->create());

    livewire(CreateCaseUpdate::class)
        ->fillForm($request->toArray())
        ->call('create')
        ->assertHasNoFormErrors();

    assertCount(1, CaseUpdate::all());

    assertDatabaseHas(CaseUpdate::class, $request->toArray());
});
