<?php

namespace App\Models;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
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


}
