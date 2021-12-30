<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Transaction;
use App\Models\OrderItem;

class Film extends Model
{
    use HasFactory;

    public function genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

}
