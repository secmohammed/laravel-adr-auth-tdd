<?php

namespace Tests\Unit\Users\Domain\Services;

use App\Users\Domain\Mails\ResetPassword;
use App\Users\Domain\Models\PasswordReset;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Repositories\PasswordResetRepository;
use App\Users\Domain\Repositories\UserRepository;
use App\Users\Domain\Services\ForgotUserPasswordService;
use Mail;
use Tests\TestCase;

class ForgotUserPasswordServiceTest extends TestCase
{
    /** @test */
    public function it_should_fail_if_user_is_not_activated_and_trying_to_forgot_password()
    {
        $user = factory(User::class)->make();
        $this->mock(UserRepository::class)->shouldReceive('whereEmail')->once()->andReturn($builder = $this->mock('Builder'));

        $builder->shouldReceive('firstOrFail')->once()->andReturn($user);

        $this->mock(ActivationRepository::class)->shouldReceive('completed')->with($user)->andReturn(false);

        $forgotUserPasswordService = new ForgotUserPasswordService(
            app(UserRepository::class),
            app(PasswordResetRepository::class),
            app(ActivationRepository::class)
        );
        $data = [
            'email' => 'mohammedosama@ieee.org',
        ];
        $response = $forgotUserPasswordService->handle($data);
        $this->assertEquals(422, $response->getStatus());
    }
    /** @test */
    public function it_should_create_user_a_reminder_token_if_user_exists_and_activation_is_completed()
    {
        \Mail::fake();
        $user = factory(User::class)->make();
        $reminder = factory(PasswordReset::class)->make([
            'user_id' => $user->id,
        ]);
        $this->mock(UserRepository::class)->shouldReceive('whereEmail')->once()->andReturn($builder = $this->mock('Builder'));

        $builder->shouldReceive('firstOrFail')->once()->andReturn($user);
        $this->mock(ActivationRepository::class)->shouldReceive('completed')->with($user)->andReturn(true);
        $this->mock(PasswordResetRepository::class)->shouldReceive('hasOrCreateToken')->once()->andReturn($reminder);

        $forgotUserPasswordService = new ForgotUserPasswordService(
            app(UserRepository::class),
            app(PasswordResetRepository::class),
            app(ActivationRepository::class)
        );
        $data = [
            'email' => 'mohammedosama@ieee.org',
        ];
        $response = $forgotUserPasswordService->handle($data);
        $this->assertEquals(200, $response->getStatus());
        \Mail::assertSent(ResetPassword::class, function ($mail) use ($user) {
            return $mail->user->id == $user->id;
        });
    }
}
