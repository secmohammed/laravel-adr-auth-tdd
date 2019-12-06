<?php

namespace Tests\Unit\Users\Domain\Services;

use App\Users\Domain\Models\Activation;
use App\Users\Domain\Models\User;
use App\Users\Domain\Repositories\ActivationRepository;
use App\Users\Domain\Services\ActivateUserAccountService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Tests\TestCase;

class ActivateUserAccountServiceTest extends TestCase
{
    /** @test */
    public function it_should_fail_if_activation_process_is_not_completed()
    {
        $user = factory(User::class)->make();
        $token = Str::random(32);
        $this->mock(ActivationRepository::class)->shouldReceive('complete')->with($user, $token)->andThrows(new ModelNotFoundException(Activation::class, 404));
        $activateUserAccountService = new ActivateUserAccountService(
            app(ActivationRepository::class)
        );
        try {
            $activateUserAccountService->handle($user, $token);
        } catch (ModelNotFoundException $e) {
            $this->assertEquals(404, $e->getCode());
        }
    }
    /** @test */
    public function it_should_succeed_if_activation_process_is_completed()
    {
        $user = factory(User::class)->make();
        $token = Str::random(32);
        $this->mock(ActivationRepository::class)->shouldReceive('complete')->with($user, $token)->andReturn(true);
        $activateUserAccountService = new ActivateUserAccountService(
            app(ActivationRepository::class)
        );
        $response = $activateUserAccountService->handle($user, $token);
        $this->assertEquals(200, $response->getStatus());
    }
}
