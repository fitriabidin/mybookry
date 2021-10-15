<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->hasMany(Category::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }

}
