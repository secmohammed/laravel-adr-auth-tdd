<?php

namespace Tests\Unit\Users\Domain\Models;

use App\Users\Domain\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class RoleTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->role = new Role;
    }
    /** @test */
    public function it_has_permissions_column_casted_to_array()
    {
        $this->assertEquals([
            'permissions' => 'array',
            'id' => 'int',
        ], $this->role->getCasts());
    }
    /** @test */
    public function it_fetches_the_permissions_column_in_the_array_format()
    {
        $role = factory(Role::class)->make();
        $this->assertTrue(is_array($role->permissions));
    }
    /** @test */
    public function it_has_many_to_many_users_relationship()
    {
        $this->assertInstanceOf(BelongsToMany::class, $this->role->users());
    }
    /** @test */
    public function it_has_many_to_many_users_relationship_with_role_users_table()
    {
        $this->assertEquals('role_user', $this->role->users()->getTable());
    }
    /** @test */
    public function it_has_many_to_many_users_relationship_with_role_id_as_a_foriegn_key()
    {
        $this->assertEquals('role_id', $this->role->users()->getForeignPivotKeyName());
    }
    /** @test */
    public function it_has_many_to_many_relationship_with_role_id_foreign_key_to_id_column()
    {
        $this->assertEquals('roles.id', $this->role->users()->getQualifiedParentKeyName());
    }
}
