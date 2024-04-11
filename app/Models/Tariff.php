<?php
namespace App\Models;
use App\Models\Reserveren;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    // ...

    public function reservations()
    {
        return $this->hasMany(Reserveren::class);
    }
    
}