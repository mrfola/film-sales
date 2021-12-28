<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FilmOrder;
use App\Models\User;
use App\Models\Transaction;

class Order extends Model
{
    use HasFactory;

    public function FilmOrders()
    {
        return $this->hasMany(FilmOrder::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
