<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $film_id = $request->film_id;
        if($request->session()->has('cart_items'))
        {
            $request->session()->push('cart_items', $film_id);//add new film id to cart items in session

        }else
        {
            $cart_items = [];
            $cart_items[] = $film_id;
            $request->session()->put('cart_items', $cart_items);//add new film id to cart items in session  
        }

        return redirect(route('cart_show'));
    }

    public function show()
    {
        $session_cart_items = session('cart_items');
        $cart_items = Film::whereIn('id', $session_cart_items)->get();//getting film details from db based on film_id in session

        $data = ["cart_items" => $cart_items];
        return view('cart', $data);
    }

    public function removeFromCart(Request $request)
    {
        $film_id = $request->film_id;
       

        if($request->session()->has('cart_items'))
        {
            $cart_items = $request->session()->get('cart_items');

            if (($key = array_search($film_id, $cart_items)) !== false) {
                unset($cart_items[$key]);
            }
        
            $request->session()->put('cart_items', $cart_items);
        }

        return back();
    }
}
