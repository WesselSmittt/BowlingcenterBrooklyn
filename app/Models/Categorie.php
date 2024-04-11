<?php

namespace App\Models;
use App\Models\Tariff;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = ['user_id', 'tariff_id' ,'start_time', 'end_time', 'total_childs', 'total_adults', 'menu_id', 'price'];

    
    public function getTariffId()
    {
        $start = Carbon::parse($this->start_time);
        $end = Carbon::parse($this->end_time);
        $dayOfWeek = $start->dayOfWeek;
        $hour = $start->hour;

        if ($dayOfWeek >= Carbon::MONDAY && $dayOfWeek <= Carbon::THURSDAY) {
            return 1;
        } elseif ($dayOfWeek >= Carbon::FRIDAY && $dayOfWeek <= Carbon::SUNDAY) {
            if ($hour >= 14 && $hour < 18) {
                return 2;
            } elseif ($hour >= 18 && $hour < 24) {
                return 3;
            }
        }

        return null;
    }

    
    public function setTariffId()
    {
        $this->tariff_id = $this->getTariffId();
        $this->save();
    }


    public function calculatePrice()
    {
        // Prijzen per uur voor elk tarief
        $tariffPrices = [
            1 => 24, // Prijs voor tarief 1
            2 => 28, // Prijs voor tarief 2
            3 => 33.50, // Prijs voor tarief 3
        ];

        $startTime = strtotime($this->start_time);
        $endTime = strtotime($this->end_time);

        if ($startTime === false || $endTime === false) {
            throw new \Exception("Fout bij het omzetten van tijden naar timestamps. Starttijd: {$this->start_time}, Eindtijd: {$this->end_time}");
        }

        $hours = ($endTime - $startTime) / 3600;

        if (!isset($tariffPrices[$this->tariff_id])) {
            throw new \Exception("Onbekend tarief ID: {$this->tariff_id}");
        }

        $this->price = $hours * $tariffPrices[$this->tariff_id];
    }

     public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}