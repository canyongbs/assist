<?php

use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Validation\Rules\Enum;
use Assist\Case\Models\ServiceRequestUpdate;
use Assist\Notifications\Events\TriggeredAutoSubscription;
use Assist\Case\Filament\Resources\ServiceRequestUpdateResource;
use Assist\Case\Tests\RequestFactories\CreateCaseUpdateRequestFactory;

use function Tests\asSuperAdmin;
use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEmpty;
use function Pest\Laravel\assertDatabaseHas;

test('A successful action on the CreateServiceRequestUpdate page', function () {
    // Because we create a ServiceRequest there is already a Subscription created.
    // This causes an issue during SubscriptionCreate as a unique constraint is violated.
    // Postgres prevents any further actions from happening during a transaction when there is an error like this
    // Preventing the Subscription creation for now
    Event::fake([TriggeredAutoSubscription::class]);

    asSuperAdmin()
        ->get(
            ServiceRequestUpdateResource::getUrl('create')
        )
        ->assertSuccessful();

    $request = collect(CreateCaseUpdateRequestFactory::new()->create());

    livewire(CaseUpdateResource\Pages\CreateCaseUpdate::class)
        ->fillForm($request->toArray())
        ->call('create')
        ->assertHasNoFormErrors();

    assertCount(1, ServiceRequestUpdate::all());

    assertDatabaseHas(ServiceRequestUpdate::class, $request->except('case_id')->toArray());

    expect(ServiceRequestUpdate::first()->case->id)
        ->toEqual($request->get('case_id'));
});

test('CreateServiceRequestUpdate requires valid data', function ($data, $errors) {
    asSuperAdmin();

    livewire(CaseUpdateResource\Pages\CreateCaseUpdate::class)
        ->fillForm(CreateCaseUpdateRequestFactory::new($data)->create())
        ->call('create')
        ->assertHasFormErrors($errors);

    assertEmpty(ServiceRequestUpdate::all());
})->with(
    [
        'case missing' => [CreateCaseUpdateRequestFactory::new()->without('case_id'), ['case_id' => 'required']],
        'case not existing case id' => [CreateCaseUpdateRequestFactory::new()->state(['case_id' => fake()->uuid()]), ['case_id' => 'exists']],
        'update missing' => [CreateCaseUpdateRequestFactory::new()->without('update'), ['update' => 'required']],
        'update is not a string' => [CreateCaseUpdateRequestFactory::new()->state(['update' => 99]), ['update' => 'string']],
        'direction missing' => [CreateCaseUpdateRequestFactory::new()->without('direction'), ['direction' => 'required']],
        'direction not a valid enum' => [CreateCaseUpdateRequestFactory::new()->state(['direction' => 'invalid']), ['direction' => Enum::class]],
        'internal not a boolean' => [CreateCaseUpdateRequestFactory::new()->state(['internal' => 'invalid']), ['internal' => 'boolean']],
    ]
);

// Permission Tests

test('CreateServiceRequestUpdate is gated with proper access control', function () {
    // Because we create a ServiceRequest there is already a Subscription created.
    // This causes an issue during SubscriptionCreate as a unique constraint is violated.
    // Postgres prevents any further actions from happening during a transaction when there is an error like this
    // Preventing the Subscription creation for now
    Event::fake([TriggeredAutoSubscription::class]);

    $user = User::factory()->create();

    actingAs($user)
        ->get(
            ServiceRequestUpdateResource::getUrl('create')
        )->assertForbidden();

    livewire(CaseUpdateResource\Pages\CreateCaseUpdate::class)
        ->assertForbidden();

    $user->givePermissionTo('case_update.view-any');
    $user->givePermissionTo('case_update.create');

    actingAs($user)
        ->get(
            ServiceRequestUpdateResource::getUrl('create')
        )->assertSuccessful();

    $request = collect(CreateCaseUpdateRequestFactory::new()->create());

    livewire(CaseUpdateResource\Pages\CreateCaseUpdate::class)
        ->fillForm($request->toArray())
        ->call('create')
        ->assertHasNoFormErrors();

    assertCount(1, ServiceRequestUpdate::all());

    assertDatabaseHas(ServiceRequestUpdate::class, $request->toArray());
});
