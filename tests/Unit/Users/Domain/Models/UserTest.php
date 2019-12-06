<?php

namespace Tests\Unit\Users\Domain\Models;

use App\Users\Domain\Models\User;
use Artify\Artify\Traits\Roles\Roles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use ReflectionClass;
use Tests\TestCase;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = app(User::class);
    }
    /** @test */
    public function it_should_has_id_and_company_id_guarded()
    {
        $this->assertEquals([
            'id',
            'company_id',
        ], $this->user->getGuarded());
    }
    /** @test */
    public function it_should_has_JWT_identifier_as_null()
    {
        $this->assertNull($this->user->getJWTIdentifier());
    }
    /** @test */
    public function it_should_has_JWT_custom_claims_as_empty_array()
    {
        $this->assertEquals([], $this->user->getJWTCustomClaims());
    }
    /** @test */
    public function it_has_many_to_many_roles_relationship()
    {
        $this->assertInstanceOf(BelongsToMany::class, $this->user->roles());
    }
    /** @test */
    public function it_has_many_to_many_roles_relationship_with_user_roles_as_intermediate_table()
    {
        $this->assertEquals('role_user', $this->user->roles()->getTable());
    }

    /** @test */
    public function it_has_many_to_many_roles_relationship_with_user_id_as_local_key()
    {
        $this->assertEquals('user_id', $this->user->roles()->getForeignPivotKeyName());
    }
    /** @test */
    public function it_has_many_to_many_roles_relationship_with_tag_id_as_foreign_key()
    {
        $this->assertEquals('users.id', $this->user->roles()->getQualifiedParentKeyName());
    }

    /** @test */
    public function it_has_one_password_reset()
    {
        $this->assertInstanceOf(HasOne::class, $this->user->passwordReset());
    }
    /** @test */
    public function it_has_one_password_rest_with_user_id_foreign_key()
    {
        $this->assertEquals('user_id', $this->user->passwordReset()->getForeignKeyName());
    }
    /** @test */
    public function it_has_one_activation()
    {
        $this->assertInstanceOf(HasOne::class, $this->user->activation());
    }
    /** @test */
    public function it_has_one_activation_with_user_id_foreign_key()
    {
        $this->assertEquals('user_id', $this->user->activation()->getForeignKeyName());
    }
    /** @test */
    public function it_should_implement_JWT_subject_interface()
    {
        $this->assertInstanceOf(JWTSubject::class, $this->user);
    }
    /** @test */
    public function it_should_use_roles_trait()
    {
        $this->assertTrue(in_array(Roles::class, array_keys((new ReflectionClass(User::class))->getTraits())));
    }

}
