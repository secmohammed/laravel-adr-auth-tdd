<?php

namespace Tests\Feature\Endpoints\Users\Auth;

use App\Users\Domain\Mails\ResetPassword;
use App\Users\Domain\Models\User;
use Mail;
use Tests\TestCase;

class ForgotUserPasswordTest extends TestCase
{
    /** @test */
    public function it_should_send_user_reminder_token_when_user_is_activated()
    {
        Mail::fake();
        $user = factory(User::class)->states('with-activation')->create();
        $user->activation()->update([
            'completed_at' => now(),
        ]);
        $this->post('/api/forgot-password', [
            'email' => $user->email,
        ])->assertStatus(200);
        Mail::assertSent(ResetPassword::class, function ($mail) use ($user) {
            return $mail->user->id == $user->id;
        });
        $this->assertDatabaseHas('password_resets', [
            'user_id' => $user->id,
        ]);
    }
    /** @test */
    public function it_should_throw_an_exception_if_user_couldnt_be_found()
    {
        $this->post('/api/forgot-password', [
            'email' => 'someone@gmail.com',
        ])->assertStatus(404);
    }
    /** @test */
    public function it_shouldnt_let_user_get_reminder_token_if_user_isnt_activated_yet()
    {
        $user = factory(User::class)->create();
        $this->post('/api/forgot-password', [
            'email' => $user->email,
        ])->assertStatus(422);
    }
}
