<?php

namespace Tests\Unit\Users\Domain\Services;

use App\Users\Domain\Models\User;
use App\Users\Domain\Services\GetAuthenticatedUserService;
use Auth;
use Tests\TestCase;

class GetAuthenticatedUserServiceTest extends TestCase
{
    /** @test */
    public function it_should_return_an_instance_of_authenticated_user()
    {
        $user = factory(User::class)->make();
        Auth::shouldReceive('user')->once()->andReturn($user);
        $getAuthenticatedUserService = new GetAuthenticatedUserService;

        $response = $getAuthenticatedUserService->handle();
        $this->assertEquals($user, $response->getData());
    }
}
