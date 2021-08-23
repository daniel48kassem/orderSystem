<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
>>>>>>> cb6b438c7bf85ee4bfa6c59bb0f16ad1978c0a59
}
