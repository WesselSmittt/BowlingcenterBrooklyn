<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spel extends Model
{
    use HasFactory;

    protected $table = 'spel';

    public function persoon()
    {
        return $this->belongsTo('App\Models\Persoon', 'PersoonId');
    }
    public function reservering()
    {
        return $this->belongsTo('App\Models\Reservering', 'ReserveringId');
    }
}
