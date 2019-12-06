<?php

namespace App\Unit\Users\Domain\Requests;

use App\Users\Domain\Requests\ResetUserPasswordFormRequest;
use Illuminate\Support\Str;
use Tests\TestCase;
use Validator;

class ResetUserPasswordFormRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->resetUserPasswordFormRequest = new ResetUserPasswordFormRequest;
    }
    /** @test */
    public function it_should_fail_if_password_is_less_than_8_characters()
    {
        $attributes = [
            'password' => Str::random(3),
        ];
        $validator = Validator::make($attributes, $this->resetUserPasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_should_fail_if_password_is_more_than_32_characters()
    {
        $attributes = [
            'password' => Str::random(34),
        ];
        $validator = Validator::make($attributes, $this->resetUserPasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_should_fail_if_password_isnt_confirmed()
    {
        $attributes = [
            'password' => Str::random(32),
        ];
        $validator = Validator::make($attributes, $this->resetUserPasswordFormRequest->rules());
        $this->assertArrayHasKey('password', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_should_pass_if_password_is_valid_and_confirmed()
    {
        $attributes = [
            'password' => $password = Str::random(32),
            'password_confirmation' => $password,
        ];
        $validator = Validator::make($attributes, $this->resetUserPasswordFormRequest->rules());
        $this->assertArrayNotHasKey('password', $validator->getMessageBag()->toArray());
    }
}
