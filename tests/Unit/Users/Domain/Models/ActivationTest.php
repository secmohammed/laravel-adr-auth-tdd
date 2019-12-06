<?php

namespace Tests\Unit\Users\Domain\Models;

use App\Users\Domain\Models\Activation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ActivationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->activation = app(Activation::class);
    }
    /** @test */
    public function it_should_has_id_as_guarded()
    {
        $this->assertEquals(['id'], $this->activation->getGuarded());
    }
    /** @test */
    public function it_should_has_user_relationship()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->activation->user());
    }
    /** @test */
    public function it_should_has_user_relationship_with_user_id_as_foreign_key()
    {
        $this->assertEquals('user_id', $this->activation->user()->getForeignKeyName());
    }
    /** @test */
    public function it_should_has_user_relationship_with_id_as_local_key()
    {
        $this->assertEquals('id', $this->activation->user()->getOwnerKeyName());

    }
}
