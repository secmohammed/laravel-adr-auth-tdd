<?php

namespace Tests\Unit\Users\Domain\Services;

use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Services\ResetUserPasswordService;
use Tests\TestCase;

class ResetUserPasswordServiceTest extends TestCase
{
    /** @test */
    public function it_should_fail_if_user_tries_to_reset_password_with_invalid_token_passed()
    {
        $user = factory(User::class)->make();
        $this->mock(PasswordResetRepository::class)->shouldReceive('complete')->with($user, 'something-wrong')->andReturn(false);
        $resetUserPasswordService = new ResetUserPasswordService(
            app(PasswordResetRepository::class)
        );
        $response = $resetUserPasswordService->handle($user, 'something-wrong');
        $this->assertNull($response);
    }
    /** @test */
    public function it_should_let_user_update_password_if_token_is_correct()
    {
        $user = factory(User::class)->make([
            'password' => 'plain-text',
        ]);
        $mock = \Mockery::mock('\App\Users\Domain\Models\User[update]');
        $mock->shouldReceive('update')->with([
            'password' => bcrypt('secret'),
        ]);

        $this->mock(PasswordResetRepository::class)->shouldReceive('complete')->with($user, 'valid-token')->andReturn(true);
        $resetUserPasswordService = new ResetUserPasswordService(
            app(PasswordResetRepository::class)
        );
        $response = $resetUserPasswordService->handle($user, 'valid-token', [
            'password' => 'secret',
        ]);

        $this->assertEquals(201, $response->getStatus());
    }
}
