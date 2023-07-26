<?php

namespace Tests\Feature\Actions\RolesAndPermissions;

use Tests\TestCase;
use App\Models\Role;
use App\Actions\RolesAndPermissions\CreateRoles;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateRolesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_will_create_the_roles_defined_in_our_config(): void
    {
        resolve(CreateRoles::class)->handle();

        $this->assertCount(1, Role::where('name', 'super_admin')->api()->get());
        $this->assertCount(1, Role::where('name', 'super_admin')->web()->get());

        // TODO Remove this once Roles are more segmented
        $this->assertCount(1, Role::where('name', 'admin')->web()->get());

        // TODO Add other Roles that should exist from initial seeding
    }
}
