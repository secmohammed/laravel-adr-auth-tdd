<?php

namespace Tests\Unit\Users\Domain\Services;

use App\Users\Domain\Models\User;
use App\Users\Domain\Services\LogoutUserService;
use Tests\TestCase;

class LogoutUserServiceTest extends TestCase
{
    /** @test */
    public function it_should_logout_user_successfully()
    {
        auth()->login(
            factory(User::class)->make()
        );
        $logoutUserService = new LogoutUserService;
        $response = $logoutUserService->handle();
        $this->assertEquals(200, $response->getStatus());
        $this->assertNull(auth()->user());
    }
}
