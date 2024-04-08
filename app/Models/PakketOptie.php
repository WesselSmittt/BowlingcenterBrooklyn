<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PakketOptie extends Model
{
    use HasFactory;

    protected $table = 'pakket_optie';
    public function reserveringen()
    {
        return $this->hasMany(Reserveringen::class);
    }
}
