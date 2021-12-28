<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;
use App\Models\Order;

class FilmOrder extends Model
{
    use HasFactory;

    public function Film()
    {
        return $this->belongsTo(Film::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
