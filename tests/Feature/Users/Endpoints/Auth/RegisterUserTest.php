<?php

namespace Tests\Feature\Users\Endpoints\Auth;

use App\Users\Domain\Listeners\SendActivationMail;
use App\Users\Domain\Models\User;
use Queue;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed('RolesTableSeeder');
    }
    /** @test */
    public function it_shouldnt_let_user_register_if_email_or_username_exists()
    {
        $user = factory(User::class)->create([
            'first_name' => 'mohammed',
            'last_name' => 'osama',
        ]);
        $this->post(
            '/api/register',
            array_merge($user->toArray(), [
                'password' => 'secret123!@#',
                'password_confirmation' => 'secret123!@#',
            ])

        )->assertStatus(422)->assertJsonStructure([
            'errors' => ['email'],
        ]);
    }
    /** @test */
    public function it_registers_user_with_correct_data()
    {
        Queue::fake();
        $user = factory(User::class)->make([
            'first_name' => 'mohammed',
            'last_name' => 'osama',
            'email' => 'hello@gmail.com',
        ]);
        $this->post(
            '/api/register',
            array_merge($user->toArray(), [
                'password' => 'secret123!@#',
                'password_confirmation' => 'secret123!@#',
            ])
        );
        Queue::assertPushed(\Illuminate\Events\CallQueuedListener::class, function ($job) use ($user) {
            return $job->class === SendActivationMail::class;
        });
    }
}
