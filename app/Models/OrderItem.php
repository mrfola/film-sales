<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Film;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ["order_id", "film_id", "price", "discount", "quantity"];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
