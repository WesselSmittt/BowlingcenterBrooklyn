<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserveren extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = ['datum', 'tijd', 'aantal_personen', 'klant_id', 'medewerker_id'];

    
}
