<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;
    protected $table = 'reserveringen';

    protected $fillable = [
        'pakket_optie_id',
      
    ];

    public function persoon()
    {
        return $this->belongsTo(Persoon::class);
    }

    public function reservering_status()
    {
        return $this->belongsTo(ReserveringStatus::class);
    }

    public function pakket_optie()
    {
        return $this->belongsTo(PakketOptie::class);
    }
}
