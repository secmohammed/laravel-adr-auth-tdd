<?php

namespace Tests\Unit\Integration\App\Traits;

use App\Users\Domain\Models\Activation;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ActivationRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Tests\TestCase;

class IssueTokensTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->activationRepository = app(ActivationRepository::class);
        $this->user = factory(User::class)->create();
    }
    /** @test */
    public function it_should_throw_an_exception_if_user_doesnt_have_a_token()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->activationRepository->hasToken($this->user);
    }
    /** @test */
    public function it_should_throw_an_exception_if_user_doesnt_have_the_passed_token()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->activationRepository->hasToken($this->user, 'some-token');
    }
    /** @test */
    public function it_should_return_a_model_instance_if_token_is_found()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->assertInstanceOf(Activation::class, $this->activationRepository->hasToken($this->user));
    }
    /** @test */
    public function it_should_return_a_model_instance_if_passed_token_is_found()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->assertInstanceOf(Activation::class, $this->activationRepository->hasToken($this->user, $this->user->activation->token));
    }
    /** @test */
    public function it_should_return_the_old_token_if_user_already_has_one()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->assertEquals($this->activationRepository->hasOrCreateToken($this->user)->token, $this->user->activation->token);
    }
    /** @test */
    public function it_should_return_a_new_token_if_user_doesnt_have_a_token()
    {
        $this->assertNotEquals($this->user->activation->token ?? null, $this->activationRepository->hasOrCreateToken($this->user)->token);
    }
    /** @test */
    public function it_should_return_true_if_user_has_completed_the_process()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->user->activation->update([
            'completed_at' => now(),
        ]);
        $this->assertTrue($this->activationRepository->completed($this->user));
    }
    /** @test */
    public function it_should_return_false_if_user_hasnt_completed_the_process()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->assertFalse($this->activationRepository->completed($this->user));
    }
    /** @test */
    public function it_should_return_true_if_user_can_complete_the_process()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->assertTrue(
            $this->activationRepository->complete(
                $this->user,
                $this->user->activation->token
            )
        );
    }
    /** @test */
    public function it_should_throw_an_exception_if_the_user_cant_complete_the_process()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->expectException(ModelNotFoundException::class);
        $this->activationRepository->complete($this->user, 'invalid-token');
    }
    /** @test */
    public function it_should_regenerate_token_if_user_already_has_one()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->assertNotEquals(
            $this->user->activation->token,
            $this->activationRepository->regenerateToken($this->user)
        );
    }
    /** @test */
    public function it_should_force_generate_token_for_user()
    {
        $this->assertInstanceOf(
            Activation::class,
            $this->activationRepository->regenerateToken($this->user, true)
        );
    }
    /** @test */
    public function it_shouldnt_regenerate_token_if_user_doesnt_have_a_token_at_all()
    {
        $this->expectException(ModelNotFoundException::class);
        $this->activationRepository->regenerateToken($this->user);
    }
    /** @test */
    public function it_shouldnt_regenerate_token_if_user_has_an_expired_token()
    {
        $this->user->activation()->create([
            'token' => Str::random(32),
            'completed_at' => null,
            'created_at' => now()->subWeeks(3),
        ]);
        $this->expectException(ModelNotFoundException::class);
        $this->activationRepository->regenerateToken($this->user);
    }
    /** @test */
    public function it_shouldnt_remove_tokens_that_arent_expired_yet()
    {
        $this->user = factory(User::class)->states('with-activation')->create();
        $this->activationRepository->removeExpired();
        $this->assertDatabaseHas('activations', [
            'token' => $this->user->activation->token,
        ]);
    }
    /** @test */
    public function it_should_remove_tokens_that_are_expired_and_not_completed_yet()
    {
        $this->user->activation()->create([
            'token' => $token = Str::random(32),
            'completed_at' => null,
            'created_at' => now()->subWeeks(3),
        ]);
        $this->activationRepository->removeExpired();
        $this->assertDatabaseMissing('activations', compact('token'));
    }
}
