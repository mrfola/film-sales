<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Transaction;

class Film extends Model
{
    use HasFactory;

    public function Genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }

}
