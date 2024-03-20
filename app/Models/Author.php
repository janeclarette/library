<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'date_of_birth', 'img_path'];

    public function getImgPathsAttribute()
    {
        // Split the img_path string into an array of image paths
        return explode(',', $this->img_path);
    }
}

