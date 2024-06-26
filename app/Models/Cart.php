<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
        'processed', // Add processed to the fillable attributes
    ];

    protected $casts = [
        'processed' => 'boolean', // Cast processed attribute to boolean
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
    
}
