<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    // Vul hier de velden in die je wilt toewijzen (vulbaar zijn)
    protected $fillable = ['category_id'];
}