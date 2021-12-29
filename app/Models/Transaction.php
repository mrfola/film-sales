<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Apps\Models\Film;

class Transaction extends Model
{
    protected $fillable = ["user_id", "email", "phone", "status", "amount", "currency", "transaction_id", "first_six_digits", "last_four_digits"];

    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Film()
    {
        return $this->hasMany(Film::class);
    }
}
