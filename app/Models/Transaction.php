<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "order_id",
        "amount",
        "reference",
        "status",
        "trxref"
    ];

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
