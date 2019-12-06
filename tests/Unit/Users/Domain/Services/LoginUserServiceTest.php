<?php

namespace Tests\Unit\Users\Domain\Services;

use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\Users\Domain\Models\Activation;
use App\Users\Domain\Models\User;
use App\Users\Domain\Services\LoginUserService;
use Auth;
use Tests\TestCase;

class LoginUserServiceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->make([
            'id' => 1,
        ]);
    }
    /** @test */
    public function it_should_not_login_user_if_given_credentials_are_wrong()
    {
        $data = [
            'email' => 'someone@example.com',
            'password' => 123,

        ];
        Auth::shouldReceive('attempt')->andReturn(false);
        $response = (new LoginUserService)->handle($data);
        $this->assertInstanceOf(UnauthorizedPayload::class, $response);
        $this->assertEquals(401, $response->getStatus());
    }
    /** @test */
    public function it_should_throw_an_activation_exception_if_user_is_not_activated()
    {
        $activation = factory(Activation::class)->make([
            'user_id' => $this->user->id,
        ]);
        $this->user->setRelation('activation', [$activation]);
        Auth::shouldReceive('attempt')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user = $this->mock('StdClass'));
        $user->shouldReceive('isActivated')->andReturn(false);
        $user->shouldReceive('generateAuthToken')->andReturn('token');

        Auth::shouldReceive('logout')->andReturn(true);
        $data = [
            'email' => $this->user->email,
            'password' => 'secret',

        ];
        $response = (new LoginUserService)->handle($data);
        $this->assertInstanceOf(UnauthorizedPayload::class, $response);
    }
    /** @test */
    public function it_should_return_user_token_if_passed_credentials_are_correct()
    {
        $activation = factory(Activation::class)->states('completed')->make([
            'user_id' => $this->user->id,

        ]);
        Auth::shouldReceive('attempt')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user = $this->mock('StdClass'));
        Auth::shouldIgnoreMissing();

        $user->shouldReceive('isActivated')->andReturn(true);
        $user->shouldReceive('generateAuthToken')->andReturn('token');

        $data = [
            'email' => $this->user->email,
            'password' => 'secret',

        ];
        $response = (new LoginUserService)->handle($data);
        $this->assertInstanceOf(GenericPayload::class, $response);
    }
}
