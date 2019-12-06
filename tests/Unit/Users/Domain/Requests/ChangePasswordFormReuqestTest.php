<?php

namespace Tests\Unit\Users\Domain\Requests;

use App\Users\Domain\Requests\ChangePasswordFormRequest;
use Illuminate\Support\Str;
use Tests\TestCase;
use Validator;

class ChangePasswordFormRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->changePasswordFormRequest = new ChangePasswordFormRequest;
    }
    /** @test */
    public function it_shouldnt_pass_if_old_password_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('old_password', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_old_password_is_less_than_8_characters()
    {
        $attributes = [
            'old_password' => Str::random(5),
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('old_password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_old_password_is_more_than_32_characters()
    {
        $attributes = [
            'old_password' => Str::random(33),
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('old_password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_old_password_isnt_confirmed()
    {
        $attributes = [
            'old_password' => Str::random(32),
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayNotHasKey('old_password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_isnt_passed()
    {
        $attributes = [];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_shouldnt_pass_if_password_is_less_than_8_characters()
    {
        $attributes = [
            'password' => Str::random(5),
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_is_more_than_32_characters()
    {
        $attributes = [
            'password' => Str::random(33),
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_shouldnt_pass_if_password_isnt_confirmed()
    {
        $attributes = [
            'password' => Str::random(32),
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());

    }
    /** @test */
    public function it_should_pass_if_password_is_confirmed()
    {
        $attributes = [
            'password' => 'onetwothree',
            'password_confirmation' => 'onetwothree',
        ];
        $validator = Validator::make($attributes, $this->changePasswordFormRequest->rules());
        $this->assertArrayNotHasKey('password', $validator->getMessageBag()->toArray());

    }
}
