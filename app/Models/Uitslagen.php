<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uitslagen extends Model
{
    use HasFactory;

    protected $table = 'uitslag'; // Specificeer de tabelnaam handmatig

    public function persoon()
    {
        return $this->belongsTo(Persoon::class, 'foreign_key');
    }
    public function spel()
    {
        return $this->belongsTo('App\Models\Spel', 'SpelId');
    }
}