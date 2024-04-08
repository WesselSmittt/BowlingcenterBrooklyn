<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;

    protected $table = 'reservering';

    public function persoon()
    {
        return $this->belongsTo('App\Models\Persoon', 'PersoonId');
    }
    public function spel()
    {
        return $this->belongsTo('App\Models\Spel', 'PersoonId');
    }
}
