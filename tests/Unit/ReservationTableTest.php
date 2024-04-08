<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Tariff;
use App\Models\Menu;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if reservations table is created.
     *
     * @return void
     */
    public function testReservationsTableIsCreated()
    {
        // Create a new user, tariff, and menu instance
        $user = User::factory()->create();
        $tariff = Tariff::factory()->create();
        $menu = Menu::factory()->create();

        // Create a new reservation instance
        $reservation = Reseveren::factory()->create([
            'tariff_id' => $tariff->id,
            'user_id' => $user->id,
            'menu_id' => $menu->id,
            'start_time' => now(),
            'end_time' => now()->addHours(2),
            'total_childs' => 2,
            'total_adults' => 2,
        ]);

        // Assert that the reservation was created and exists in the database
        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
        ]);
    }
}
