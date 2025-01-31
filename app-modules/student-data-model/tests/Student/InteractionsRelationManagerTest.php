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
use AdvisingApp\Interaction\Models\Interaction;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Pages\ViewStudent;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\RelationManagers\InteractionsRelationManager;
use AdvisingApp\StudentDataModel\Models\Student;
use AdvisingApp\Team\Models\Team;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function Tests\asSuperAdmin;

test('ListInteration with display data using the is_confidential field', function () {
    $user = User::factory()->licensed(LicenseType::cases())->create();
    $user->givePermissionTo('interaction.view-any');

    $userWithoutAttach = User::factory()->licensed(LicenseType::cases())->create();
    $userWithoutAttach->givePermissionTo('interaction.view-any');

    $teamUser = User::factory()->licensed(LicenseType::cases())->create();
    $teamUser->givePermissionTo('interaction.view-any');

    $team = Team::factory()->hasAttached($teamUser, [], 'users')->create();

    $confidentialInteraction = Interaction::factory()->hasAttached($user, [], 'confidentialAccessUsers')->hasAttached($team, [], 'confidentialAccessTeams')->count(10)->create([
        'is_confidential' => true,
    ]);

    $nonConfidentialInteraction = Interaction::factory()->count(10)->create([
        'is_confidential' => false,
    ]);

    $allInteractions = $confidentialInteraction->merge($nonConfidentialInteraction);

    $student = Student::factory()
        ->create();

    $student->interactions()->saveMany($allInteractions);
    $student->refresh();

    actingAs($user);
    livewire(
        InteractionsRelationManager::class,
        [
            'ownerRecord' => $student,
            'pageClass' => ViewStudent::class,
        ]
    )
        ->set('tableRecordsPerPage', 20)
        ->assertCanSeeTableRecords($allInteractions);

    actingAs($userWithoutAttach);
    livewire(
        InteractionsRelationManager::class,
        [
            'ownerRecord' => $student,
            'pageClass' => ViewStudent::class,
        ]
    )
        ->set('tableRecordsPerPage', 10)
        ->assertCanSeeTableRecords($nonConfidentialInteraction)
        ->assertCanNotSeeTableRecords($confidentialInteraction);

    actingAs($teamUser);
    livewire(
        InteractionsRelationManager::class,
        [
            'ownerRecord' => $student,
            'pageClass' => ViewStudent::class,
        ]
    )
        ->set('tableRecordsPerPage', 20)
        ->assertCanSeeTableRecords($allInteractions);

    asSuperAdmin();
    livewire(
        InteractionsRelationManager::class,
        [
            'ownerRecord' => $student,
            'pageClass' => ViewStudent::class,
        ]
    )
        ->set('tableRecordsPerPage', 20)
        ->assertCanSeeTableRecords($allInteractions);
});
