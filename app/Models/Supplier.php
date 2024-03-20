<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'img_path', 'transactiondate', 'quantity'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
