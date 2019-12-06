<?php

namespace Tests\Unit\Users\Domain\Services;

use App\Users\Domain\Models\PasswordReset;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Repositories\UserRepository;
use App\Users\Domain\Services\ValidateUserPasswordResetTokenService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Tests\TestCase;

class ValidateUserPasswordResetTokenServiceTest extends TestCase
{
    /** @test */
    public function it_should_not_let_user_validate_his_reminder_token_if_user_is_not_activated_yet()
    {
        $user = factory(User::class)->make();
        $reminder = factory(PasswordReset::class)->make([
            'user_id' => $user->id,
        ]);
        $this->mock(ActivationRepository::class)->shouldReceive('completed')->with($user)->once()->andReturn(false);

        $validateUserReminderTokenService = new ValidateUserPasswordResetTokenService(
            app(UserRepository::class),
            app(ActivationRepository::class),
            app(PasswordResetRepository::class)
        );
        $response = $validateUserReminderTokenService->handle($user);
        $this->assertEquals([
            'message' => 'You have not activated your account',
        ], $response->getData());
    }
    /** @test */
    public function it_should_fail_if_user_tries_to_validate_an_invalid_reminder_token()
    {
        $user = factory(User::class)->make();
        $reminder = factory(PasswordReset::class)->make([
            'user_id' => $user->id,
        ]);
        $this->mock(ActivationRepository::class)->shouldReceive('completed')->with($user)->once()->andReturn(true);
        $this->mock(PasswordResetRepository::class)->shouldReceive('hasToken')->with($user, 'invalid-token')->once()->andThrows(new ModelNotFoundException(PasswordReset::class, 404));
        $validateUserReminderTokenService = new ValidateUserPasswordResetTokenService(
            app(UserRepository::class),
            app(ActivationRepository::class),
            app(PasswordResetRepository::class)
        );
        try {
            $validateUserReminderTokenService->handle($user, 'invalid-token');
        } catch (ModelNotFoundException $e) {
            $this->assertEquals(404, $e->getCode());
        }
    }
    /** @test */
    public function it_should_succeed_if_user_tries_to_validate_a_valid_reminder_token()
    {
        $user = factory(User::class)->make();
        $reminder = factory(PasswordReset::class)->make([
            'user_id' => $user->id,
        ]);
        $this->mock(ActivationRepository::class)->shouldReceive('completed')->with($user)->once()->andReturn(true);
        $this->mock(PasswordResetRepository::class)->shouldReceive('hasToken')->with($user, $reminder->token)->once()->andReturn($reminder);
        $validateUserReminderTokenService = new ValidateUserPasswordResetTokenService(
            app(UserRepository::class),
            app(ActivationRepository::class),
            app(PasswordResetRepository::class)
        );
        $response = $validateUserReminderTokenService->handle($user, $reminder->token);
        $this->assertEquals([
            'message' => 'Alright ' . $user->first_name . ' Let\'s setup a new password',
        ], $response->getData());
    }
}
