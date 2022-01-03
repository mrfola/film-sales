<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\FilmController;
use App\Models\Film;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;


class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin_auth:admin');
    }

    public function index(Request $request)
    {
        //total number of monthly sales
         $current_month = date('m');
         $current_year = date('Y');

         $order_items = OrderItem::whereMonth('created_at', '=', $current_month)->whereYear('created_at', $current_year)->get('price');
         $total_price = 0;
         foreach($order_items as $order_item)
         {   
             $total_price = $total_price + $order_item->price;
         }

        $totalMonthlySales = $total_price;


        //The total number of films purchased by the customers
        $no_of_films = OrderItem::get()->groupBy('film_id')->count();


        //film records
        if($request->has("filter_type"))
        {
            $request->validate([
                'filter_text' => ['required', 'string'],
            ]);

            switch($request->input('filter_type'))
            {
                case("STARTS_WITH"):
                    $query_string = $request->filter_text . "%";
                    $films = Film::where('name', 'LIKE', $query_string)->get();
                    break;
                
                case("ENDS_WITH"):
                    $query_string = "%". $request->filter_text;
                    $films = Film::where('name', 'LIKE', $query_string)->get();
                    break;
            }
        }else
        {
            $films = Film::orderBy('id', 'DESC')->get();
        }

        $data = [
            "monthly_sales" => $totalMonthlySales,
            "films" => $films,
            "total_no_of_films" => $no_of_films
        ];

        return view('admin.home', $data);
    }
}
