<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;

class Genre extends Model
{
    use HasFactory;

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
