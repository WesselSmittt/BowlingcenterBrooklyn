<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveringStatus extends Model
{
    use HasFactory;

    protected $table = 'reservering_status';

    public function reserveringen()
    {
        return $this->hasMany(Reserveringen::class, 'reservering_status_id');
    }
}
