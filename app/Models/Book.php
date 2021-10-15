<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(fn($query)=>
             $query->where('title', 'like' , '%' . $search . '%')
            ->orWhere('isbn', 'like' , '%' . $search . '%')
        ));


        $query->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) =>
            $query->where('id',$category))
        );

    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function mybook()
    {
        return $this->belongsTo(Mybook::class);
    }
}
