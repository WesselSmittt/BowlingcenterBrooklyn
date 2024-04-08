<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if users table is created.
     *
     * @return void
     */
    public function testUsersTableIsCreated()
    {
        // Create a new user instance
        $user = User::factory()->create();

        // Assert that the user was created and exists in the database
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }
}
