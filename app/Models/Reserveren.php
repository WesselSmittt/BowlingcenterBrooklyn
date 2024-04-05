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


     public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
    protected $fillable = ['datum', 'tijd', 'aantal_personen', 'klant_id', 'medewerker_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
