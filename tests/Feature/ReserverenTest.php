<?php

namespace Tests\Unit;

use App\Models\Reserveren;
use PHPUnit\Framework\TestCase;

class ReserverenTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $reserveren = new Reserveren();

        $reserveren->start_time = '2022-12-01 10:00:00';
        $reserveren->end_time = '2022-12-01 12:00:00';
        $reserveren->total_childs = 5;
        $reserveren->total_adults = 2;
        $reserveren->package = 'snackpakket_basis';

        $this->assertEquals('2022-12-01 10:00:00', $reserveren->start_time);
        $this->assertEquals('2022-12-01 12:00:00', $reserveren->end_time);
        $this->assertEquals(5, $reserveren->total_childs);
        $this->assertEquals(2, $reserveren->total_adults);
        $this->assertEquals('snackpakket_basis', $reserveren->package);
    }
    
}
