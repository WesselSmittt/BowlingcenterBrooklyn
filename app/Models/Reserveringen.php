<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserveringen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'reserveringen';

    /**
     * Get the user that owns the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function persoon()
    {
        return $this->belongsTo(Persoon::class, 'persoon_id');
    }

    public function pakketOptie()
    {
        return $this->belongsTo(PakketOptie::class, 'pakket_optie_id');
    }

    public function reserveringStatus()
    {
        return $this->belongsTo(ReserveringStatus::class, 'reservering_status_id');
    }
}
