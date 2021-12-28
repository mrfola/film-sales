<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\FilmOrder;
use App\Models\Order;

class Film extends Model
{
    use HasFactory;

    public function Genres()
    {
        return $this->hasMany(Genre::class);
    }

    public function FilmOrders()
    {
        return $this->hasMany(FilmOrder::class);
    }

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }

}
