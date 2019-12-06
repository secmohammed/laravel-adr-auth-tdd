<?php

namespace Tests\Feature\Endpoints\Users\Auth;

use App\Users\Domain\Models\User;
use Tests\TestCase;

class ChangeUserPasswordTest extends TestCase
{
    /** @test */
    public function it_shouldnt_let_user_change_password_if_current_password_passed_incorrectly()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('onetwothree'),
        ]);
        $this->jsonAs($user, 'POST', '/api/change-password', [
            'old_password' => 'another-password',
            'password' => 'another-secret',
            'password_confirmation' => 'another-secret',
        ])->assertStatus(406);
    }
    /** @test */
    public function it_should_let_user_change_password_if_current_password_passed_correctly()
    {
        $user = factory(User::class)->create([
            'password' => '$2y$10$oIXdLBWy4sUtetlXmb1D7eDaZHI23z21f2wLGHyRgTJ4CW/6fAu16',
        ]);
        $this->jsonAs($user, 'POST', '/api/change-password', [
            'old_password' => 'secret123!@#',
            'password' => 'another-secret',
            'password_confirmation' => 'another-secret',
        ])->assertStatus(200);
    }
}
