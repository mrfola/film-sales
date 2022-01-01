<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;
use App\Models\Transaction;
use App\Models\OrderItem;

class Film extends Model
{
    protected $fillable=["name", "description", "genre_id", "rating", "price"];
    use HasFactory;

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
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
