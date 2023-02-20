<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_created(): void
    {
        $user = User::factory()->create(['username' => 'laravel']);

        $this->assertNotNull($user);
        $this->assertEquals($user->username, 'laravel');
        $this->assertEquals($user->id, 1);
        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertTrue(true);
    }
}
