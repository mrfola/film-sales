<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function lastFilmBought()
    {
        if(($this->orders()->orderBy('id', 'DESC')->first()) != null)
        {
            $last_order = $this->orders()->orderBy('id', 'DESC')->first();
            $last_order_item = $last_order->orderItems('id', 'DESC')->get()->first();
            $last_film = $last_order_item->film()->first()->name;

            return $last_film;
        }else 
        {
           return "No film bought yet";
        }
    }

    public function getAge()
    {
        if(isset($this->date_of_birth))
        {
            $DOB = Carbon::parse($this->date_of_birth);
            $currentDate = Carbon::now();
            $age = $DOB->diffInYears($currentDate);

            return $age;

        }else
        {
            return "Record not available";
        }
    }

    public function noOfPurchases()
    {
        $orders = $this->orders()->get();
        if(count($orders) <= 0)
        {
            return "No film bought yet";

        }else 
        {
           $no_of_purchases = 0;

           foreach ($orders as $order)
           {
               $no_of_order_items = $order->orderItems()->get()->count();
               $no_of_purchases = $no_of_purchases + $no_of_order_items;
           }

           return $no_of_purchases;
        }
    }
}
