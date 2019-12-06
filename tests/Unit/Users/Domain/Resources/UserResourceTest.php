<?php

namespace Tests\Unit\Users\Domain\Resources;

use App\Users\Domain\Models\User;
use App\Users\Domain\Resources\UserResource;
use Tests\TestCase;

class UserResourceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->make();
    }
    /** @test */
    public function it_should_return_a_normal_resource_without_any_relation_loaded()
    {
        $user = new UserResource($this->user);
        $this->assertEquals([
            'id' => $this->user->id,
            'email' => $this->user->email,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'permissions' => $this->user->getPermissions()->toArray(),
            'created_at_human' => $this->user->created_at->diffForHumans(),
            'updated_at_human' => $this->user->updated_at->diffForHumans(),
        ], $user->resolve());
    }
}
