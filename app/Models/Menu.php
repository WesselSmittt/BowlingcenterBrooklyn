<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Menu extends Model
{
    use HasFactory;
    
    protected $table = 'menu';
    protected $fillable = ['name', 'price', 'category'];

    public function products()
    {
    return $this->hasMany(product::class);
    }
}


