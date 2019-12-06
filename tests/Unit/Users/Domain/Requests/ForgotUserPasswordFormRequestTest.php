<?php

namespace App\Unit\Users\Domain\Requests;

use App\Users\Domain\Requests\ForgotUserPasswordFormRequest;
use Tests\TestCase;
use Validator;

class ForgotUserPasswordFormRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->forgotUserPasswordFormRequest = new ForgotUserPasswordFormRequest;
    }
    /** @test */
    public function it_should_fail_if_email_isnt_supplied()
    {
        $attributes = [
            'email' => null,
        ];
        $validator = Validator::make($attributes, $this->forgotUserPasswordFormRequest->rules());
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_should_fail_if_email_isnt_type_of_email()
    {
        $attributes = [
            'email' => 'mohammedosama',
        ];
        $validator = Validator::make($attributes, $this->forgotUserPasswordFormRequest->rules());
        $this->assertArrayHasKey('email', $validator->getMessageBag()->toArray());
    }
    /** @test */
    public function it_should_pass_if_supplied_email_is_valid()
    {
        $attributes = [
            'email' => 'mohammedosama@ieee.org',
        ];
        $validator = Validator::make($attributes, $this->forgotUserPasswordFormRequest->rules());
        $this->assertTrue($validator->passes());
    }
}
