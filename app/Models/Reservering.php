<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;
    protected $table = 'reserveringen';

    protected $fillable = [
        'persoon_id',
        'reservering_status_id',
        'pakket_optie_id',
        'aantal_kinderen',
        'aankomst_datum',
        'vertrek_datum',
        'aankomst_tijd',
        'vertrek_tijd',
        'prijs',
        'opmerking',
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
