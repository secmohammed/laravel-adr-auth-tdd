<?php

namespace Tests\Unit\Users\Domain\Requests;

use App\Users\Domain\Models\User;
use App\Users\Domain\Requests\RegisterFormRequest;
use App\Users\Domain\Requests\RegisterUserFormRequest;
use Illuminate\Support\Str;
use Tests\TestCase;
use Validator;

class RegisterUserFormRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->registerFormRequest = new RegisterUserFormRequest;
    }
    /** @test */
    public function it_shouldnt_pass_if_first_name_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('first_name', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_first_name_isnt_a_string()
    {
        $attributes = ['first_name' => false];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('first_name', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_first_name_is_less_than_4_characters()
    {
        $attributes = ['first_name' => Str::random(3)];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('first_name', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_first_name_is_more_than_40_characters()
    {
        $attributes = ['first_name' => Str::random(41)];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('first_name', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_last_name_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('last_name', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_last_name_isnt_a_string()
    {
        $attributes = ['last_name' => false];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('last_name', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_last_name_is_less_than_4_characters()
    {
        $attributes = ['last_name' => Str::random(3)];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('last_name', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_last_name_is_more_than_40_characters()
    {
        $attributes = ['last_name' => Str::random(41)];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('last_name', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shoulnt_pass_if_email_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_email_isnt_actually_an_email()
    {
        $attributes = [
            'email' => 'something',
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_email_is_actually_an_email_format()
    {
        $attributes = $this->makeByAttribute([
            'email',
        ]);
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayNotHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_email_isnt_unique()
    {
        $attributes = ['email' => Str::random(41)];
        Validator::shouldReceive('make')->with($attributes, $this->registerFormRequest->rules())->andReturn($validator = $this->mock(StdClass::class));
        $validator->shouldReceive('validateUnique')->andReturn(false);
        $validator->shouldReceive('getMessageBag')->andReturn(collect([
            'email' => [
                'email is not unique',
            ],
        ]));
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_password_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_is_less_than_8_characters()
    {
        $attributes = [
            'password' => Str::random(5),
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_is_more_than_32_characters()
    {
        $attributes = [
            'password' => Str::random(33),
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_isnt_confirmed()
    {
        $attributes = [
            'password' => Str::random(32),
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_first_name_is_passed_as_string_and_between_4_and_40_characters()
    {
        $attributes = [
            'first_name' => Str::random(20),
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayNotHasKey('first_name', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_last_name_is_passed_as_string_and_between_4_and_40_characters()
    {
        $attributes = [
            'last_name' => Str::random(20),
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayNotHasKey('last_name', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_passed_email_is_passed_in_email_format_and_is_unique()
    {
        $attributes = $this->makeByAttribute([
            'email',
        ]);
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayNotHasKey('email', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_when_password_is_between_6_and_32_characters_and_confirmed()
    {
        $attributes = [
            'password' => 'onetwothree',
            'password_confirmation' => 'onetwothree',
        ];
        $validator = Validator::make($attributes, $this->registerFormRequest->rules());
        $this->assertArrayNotHasKey('password', $validator->getMessageBag()->toArray());

    }
    protected function makeByAttribute(array $attributes)
    {
        return factory(User::class)->make()->only($attributes);
    }

}
