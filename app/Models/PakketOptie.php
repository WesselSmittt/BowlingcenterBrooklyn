<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PakketOptie extends Model
{
    use HasFactory;

    protected $table = 'pakket_opties';

    public function pakket()
    {
        return $this->belongsTo(Reservering::class);
    }
}
