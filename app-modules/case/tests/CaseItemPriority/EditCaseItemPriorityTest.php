<?php

use App\Models\User;

use function Tests\asSuperAdmin;
use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

use Assist\Case\Models\CaseItemPriority;

use function Pest\Laravel\assertDatabaseHas;
use function PHPUnit\Framework\assertEquals;

use Assist\Case\Filament\Resources\CaseItemPriorityResource;
use Assist\Case\Tests\RequestFactories\EditCaseItemPriorityRequestFactory;

test('A successful action on the EditCaseItemPriority page', function () {
    $caseItemPriority = CaseItemPriority::factory()->create();

    asSuperAdmin()
        ->get(
            CaseItemPriorityResource::getUrl('edit', [
                'record' => $caseItemPriority->getRouteKey(),
            ])
        )
        ->assertSuccessful();

    $editRequest = EditCaseItemPriorityRequestFactory::new()->create();

    livewire(CaseItemPriorityResource\Pages\EditCaseItemPriority::class, [
        'record' => $caseItemPriority->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $caseItemPriority->name,
        ])
        ->fillForm($editRequest)
        ->call('save')
        ->assertHasNoFormErrors();

    assertEquals($editRequest['name'], $caseItemPriority->fresh()->name);
});

test('EditCaseItemPriority requires valid data', function ($data, $errors) {
    asSuperAdmin();

    $caseItemPriority = CaseItemPriority::factory()->create();

    livewire(CaseItemPriorityResource\Pages\EditCaseItemPriority::class, [
        'record' => $caseItemPriority->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $caseItemPriority->name,
        ])
        ->fillForm(EditCaseItemPriorityRequestFactory::new($data)->create())
        ->call('save')
        ->assertHasFormErrors($errors);

    assertDatabaseHas(CaseItemPriority::class, $caseItemPriority->toArray());
})->with(
    [
        'name missing' => [EditCaseItemPriorityRequestFactory::new()->state(['name' => null]), ['name' => 'required']],
        'name not a string' => [EditCaseItemPriorityRequestFactory::new()->state(['name' => 1]), ['name' => 'string']],
    ]
);

// Permission Tests

test('EditCaseItemPriority is gated with proper access control', function () {
    $user = User::factory()->create();

    $caseItemPriority = CaseItemPriority::factory()->create();

    actingAs($user)
        ->get(
            CaseItemPriorityResource::getUrl('edit', [
                'record' => $caseItemPriority,
            ])
        )->assertForbidden();

    livewire(CaseItemPriorityResource\Pages\EditCaseItemPriority::class, [
        'record' => $caseItemPriority->getRouteKey(),
    ])
        ->assertForbidden();

    $user->givePermissionTo('case_item_priority.view-any');
    $user->givePermissionTo('case_item_priority.*.update');

    actingAs($user)
        ->get(
            CaseItemPriorityResource::getUrl('edit', [
                'record' => $caseItemPriority,
            ])
        )->assertSuccessful();

    $request = collect(EditCaseItemPriorityRequestFactory::new()->create());

    livewire(CaseItemPriorityResource\Pages\EditCaseItemPriority::class, [
        'record' => $caseItemPriority->getRouteKey(),
    ])
        ->fillForm($request->toArray())
        ->call('save')
        ->assertHasNoFormErrors();

    assertEquals($request['name'], $caseItemPriority->fresh()->name);
});
