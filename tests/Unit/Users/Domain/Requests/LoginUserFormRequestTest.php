<?php

namespace Tests\Unit\Users\Domain\Requests;

use App\Users\Domain\Models\User;
use App\Users\Domain\Requests\LoginFormRequest;
use App\Users\Domain\Requests\LoginUserFormRequest;
use Illuminate\Support\Str;
use Tests\TestCase;
use Validator;

class LoginUserFormRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->loginFormRequest = new LoginUserFormRequest;
    }

    /** @test */
    public function it_shoulnt_pass_if_email_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_email_isnt_actually_an_email()
    {
        $attributes = [
            'email' => 'something',
        ];
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_email_is_actually_an_email_format()
    {
        $attributes = $this->makeByAttribute([
            'email',
        ]);
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayNotHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_is_less_than_8_characters()
    {
        $attributes = [
            'password' => Str::random(5),
        ];
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_is_more_than_32_characters()
    {
        $attributes = [
            'password' => Str::random(33),
        ];
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_password_is_in_between_8_and_32_characters()
    {
        $attributes = [
            'password' => Str::random(32),
        ];
        $validator = Validator::make($attributes, $this->loginFormRequest->rules());
        $this->assertArrayNotHasKey('password', $validator->getMessageBag()->toArray());

    }
    protected function makeByAttribute(array $attributes)
    {
        return factory(User::class)->make()->only($attributes);
    }

}
