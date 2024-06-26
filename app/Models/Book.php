<?php

namespace App\Models;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'name',
        'description',
        'price',
        'img_path',
        'author_id',
        'genre_id'
    ];


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

        public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'book_id');
    }
    public function reviews()
    {
        return $this->hasManyThrough(OrderReview::class, Order::class);
    }
}
