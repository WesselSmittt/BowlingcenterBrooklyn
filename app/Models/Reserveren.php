<?php

namespace App\Models;
use App\Models\Tariff;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserveren extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = ['datum', 'tijd', 'aantal_personen', 'klant_id', 'medewerker_id', 'tariff_id', 'start_time', 'end_time'];

    
    public function calculatePrice()
{
    $start = Carbon::parse($this->start_time);
    $end = Carbon::parse($this->end_time);
    $duration = $start->diffInHours($end);

    if ($this->tariff === null) {
        // Handle the case when there's no related Tariff
        return 0;
    }

    switch ($this->tariff_id) {
        case 1:
            // Monday to Thursday
            return $this->tariff->product_price * $duration;
        case 2:
            // Friday to Sunday, 14:00 to 18:00
            return $this->tariff->product_price * $duration;
        case 3:
            // Friday to Sunday, 18:00 to 24:00
            return $this->tariff->product_price * $duration;
        default:
            // Default to the lowest price
            return $this->tariff->product_price * $duration;
    }
}

        public function tariff()
        {
            return $this->belongsTo(Tariff::class);
        }
}