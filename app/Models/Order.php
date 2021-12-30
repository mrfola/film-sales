<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Transaction;

class Order extends Model
{
    use HasFactory;

    protected $fillable =  ["user_id","total_amount", "transaction_id", "status"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
