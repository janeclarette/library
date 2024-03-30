<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'date_ordered',
        'courier',
        'status',
        'shipping_fee',
        'payment_method',
        'received',
        'cancellation_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
