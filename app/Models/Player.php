<?php

namespace App\Models;

use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    
    public function score()
    {
        return $this->belongsTo(Score::class);
    }
}
