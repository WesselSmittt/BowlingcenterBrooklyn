<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

//     public function player()
// {
    
//     return $this->belongsToMany(Player::class);
// }
public function players()
{
    return $this->belongsToMany(Player::class);
}
}
