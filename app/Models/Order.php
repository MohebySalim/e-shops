<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['total_amount', 'shipping_address', 'billing_address', 'users_id', 'payments_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payments_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}