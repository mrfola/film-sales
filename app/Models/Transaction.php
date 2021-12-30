<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Apps\Models\Film;
use Apps\Models\Order;

class Transaction extends Model
{
    protected $fillable = ["user_id", "email", "phone", "status", "amount", "currency", "transaction_ref", "first_six_digits", "last_four_digits"];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function film()
    {
        return $this->hasMany(Film::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
