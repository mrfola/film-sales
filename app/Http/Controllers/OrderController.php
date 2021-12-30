<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Controllers\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_items = OrderItem::where('id', Auth()->id())->all();
        $data = ["order_items" => $order_item];

        return view('past_orders', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        $order_data = 
        [
            "user_id" => $data["user_id"],
            "total_amount" => $data["total_amount"],
            "transaction_id" => $data["transaction_id"]
        ];

        $order = Order::create($order_data);

        // $order->user_id = $data["user_id"];
        // $order->total_amount = $data["total_amount"];
        // $order->transaction_id = $data["transaction_id"];

        // $store_order = $order->save();

        if($order)
        {
           $products_array = json_decode($data["products_array"], true);

            foreach($products_array as $product)
            {
                $data = array();

                $data["order_id"] = $order->id;
                $data["film_id"] = $product["id"];
                $data["price"] = $product["price"];

                $order_item = new OrderItemController();
                $order_item->store($data);
            }

            //remove order from session
            session()->flush();
            return redirect(route('orders_show'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
