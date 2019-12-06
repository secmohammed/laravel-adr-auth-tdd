<?php

namespace Tests\Feature\Endpoints\Users\Auth;

use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\PasswordResetRepository;
use Tests\TestCase;

class ValidateUserReminderTokenTest extends TestCase
{
    /** @test */
    public function it_shouldnt_let_user_validate_his_reminder_token_if_user_isnt_activated_yet()
    {
        $user = factory(User::class)->states('with-activation')->create();
        $this->get(vsprintf('/api/reset-password/%s/%s', [
            $user->id,
            $user->activation->token,
        ]))->assertJson([
            'message' => 'You have not activated your account',
        ]);
    }
    /** @test */
    public function it_shouldnt_return_a_response_message_with_invalid_token_if_passed_token_doesnt_belong_to_the_user()
    {
        $user = factory(User::class)->states('with-activation')->create();
        $anotherUser = factory(User::class)->states('with-activation')->create();
        app(PasswordResetRepository::class)->generateToken($user);
        app(PasswordResetRepository::class)->generateToken($anotherUser);
        $user->activation->update([
            'completed_at' => now(),
        ]);
        $this->get(vsprintf('/api/reset-password/%s/%s', [
            $user->id,
            $anotherUser->passwordReset->token,
        ]))->assertJson([
            'message' => 'Could not find such a record',
        ])->assertStatus(404);
    }
    /** @test */
    public function it_should_return_a_success_message_response_if_passed_token_is_valid()
    {
        $user = factory(User::class)->states('with-activation')->create();
        app(PasswordResetRepository::class)->generateToken($user);
        $user->activation->update([
            'completed_at' => now(),
        ]);
        $this->get(vsprintf('/api/reset-password/%s/%s', [
            $user->id,
            $user->passwordReset->token,
        ]))->assertJson([
            'message' => 'Alright ' . $user->first_name . ' Let\'s setup a new password',
        ]);
    }
}
