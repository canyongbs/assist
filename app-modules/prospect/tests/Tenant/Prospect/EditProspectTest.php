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

use AdvisingApp\Prospect\Database\Seeders\ProspectStatusSeeder;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Actions\ConvertToStudent;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Actions\DisassociateStudent;
use AdvisingApp\Prospect\Filament\Resources\ProspectResource\Pages\EditProspect;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectStatus;
use AdvisingApp\Prospect\Tests\Tenant\Prospect\RequestFactories\EditProspectRequestFactory;
use AdvisingApp\StudentDataModel\Models\Student;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\seed;
use function Pest\Livewire\livewire;

// TODO: Write EditProspect page tests
//test('A successful action on the EditProspect page', function () {});
//
//test('EditProspect requires valid data', function ($data, $errors) {})->with([]);

// Permission Tests

test('EditProspect is gated with proper access control', function () {
    $user = User::factory()->licensed(Prospect::getLicenseType())->create();

    $prospect = Prospect::factory()->create();

    actingAs($user)
        ->get(
            ProspectResource::getUrl('edit', [
                'record' => $prospect,
            ])
        )->assertForbidden();

    livewire(EditProspect::class, [
        'record' => $prospect->getRouteKey(),
    ])
        ->assertForbidden();

    $user->givePermissionTo('prospect.view-any');
    $user->givePermissionTo('prospect.*.update');

    actingAs($user)
        ->get(
            ProspectResource::getUrl('edit', [
                'record' => $prospect,
            ])
        )->assertSuccessful();

    // TODO: Finish these tests to ensure changes are allowed
    $request = collect(EditProspectRequestFactory::new()->create());

    livewire(EditProspect::class, [
        'record' => $prospect->getRouteKey(),
    ])
        ->fillForm($request->toArray())
        ->call('save')
        ->assertHasNoFormErrors();

    expect($prospect->fresh()->status_id)->toEqual($request->get('status_id'))
        ->and($prospect->fresh()->source_id)->toEqual($request->get('source_id'))
        ->and($prospect->fresh()->first_name)->toEqual($request->get('first_name'))
        ->and($prospect->fresh()->last_name)->toEqual($request->get('last_name'))
        ->and($prospect->fresh()->full_name)->toEqual($request->get('full_name'))
        ->and($prospect->fresh()->preferred)->toEqual($request->get('preferred'))
        ->and($prospect->fresh()->description)->toEqual($request->get('description'))
        ->and($prospect->fresh()->sms_opt_out)->toEqual($request->get('sms_opt_out'))
        ->and($prospect->fresh()->email_bounce)->toEqual($request->get('email_bounce'))
        ->and($prospect->fresh()->birthdate->toDateString())->toEqual($request->get('birthdate'))
        ->and($prospect->fresh()->hsgrad)->toEqual($request->get('hsgrad'))
        ->and($prospect->fresh()->created_by_id)->toEqual($request->get('created_by_id'));
});

test('convert action visible when prospect is not converted to student', function () {
    $user = User::factory()->licensed(Prospect::getLicenseType())->create();

    $prospect = Prospect::factory()->create();

    $user->givePermissionTo('prospect.view-any');
    $user->givePermissionTo('prospect.*.update');

    actingAs($user);

    livewire(EditProspect::class, [
        'record' => $prospect->getRouteKey(),
    ])
        ->assertSuccessful()
        ->assertActionVisible(ConvertToStudent::class)
        ->assertActionHidden(DisassociateStudent::class);
});

test('edit page is forbidden when prospect is converted to student', function () {
    $user = User::factory()->licensed([Prospect::getLicenseType(), Student::getLicenseType()])->create();

    $prospect = Prospect::factory()
        ->for(Student::factory(), 'student')
        ->create();

    $user->givePermissionTo('prospect.view-any');
    $user->givePermissionTo('prospect.*.update');

    actingAs($user);

    livewire(EditProspect::class, [
        'record' => $prospect->getRouteKey(),
    ])
        ->assertForbidden();
});

test('convert prospect to student', function () {
    $user = User::factory()->licensed([Prospect::getLicenseType(), Student::getLicenseType()])->create();

    $user->givePermissionTo('prospect.view-any');
    $user->givePermissionTo('prospect.*.update');

    actingAs($user);

    seed([
        ProspectStatusSeeder::class,
    ]);

    $prospect = Prospect::factory()
        ->create();

    $student = Student::factory()
        ->create();

    livewire(EditProspect::class, [
        'record' => $prospect->getRouteKey(),
    ])
        ->callAction(
            ConvertToStudent::class,
            data: ['student_id' => $student->getKey()]
        )->assertSuccessful();

    $prospect->refresh();

    $status = ProspectStatus::query()
        ->where('classification', 'converted')
        ->where('name', 'Converted')
        ->where('is_system_protected', true)
        ->firstOrFail();

    expect($prospect)
        ->status->toEqual($status);

    expect($prospect->student)
        ->sisid->toBe($student->sisid)
        ->full_name->toBe($student->full_name)
        ->email->toBe($student->email);
});
