<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\OrderController;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {
        $email = $data["customer"]["email"];
        $phone = $data["customer"]["phone_number"];
        $status = $data["status"];
        $amount = $data["amount"];
        $products_array = $data["meta"]["products_array"];
        $currency =  $data["currency"];
        $transaction_ref =  $data["tx_ref"];
        $first_six_digits = $data["card"]["first_6digits"];
        $last_four_digits =  $data["card"]["last_4digits"];
        $created_at =  $data["created_at"];
      
        $new_data = 
        [
        "user_id" => Auth()->id(),
        "email" => $email,
        "phone" => $phone,
        "status" => $status,
        "amount" => $amount,
        "currency" => $currency,
        "transaction_ref" => $transaction_ref,
        "first_six_digits" => $first_six_digits,
        "last_four_digits" => $last_four_digits
        ];

        $create_transaction = Transaction::create($new_data);
        if($create_transaction)
        {
            $data = array();
            $data["user_id"] = $new_data["user_id"];
            $data["total_amount"] = $new_data["amount"];
            $data["transaction_id"] = $create_transaction->id;
            $data["products_array"] = $products_array;

            echo '<script language="javascript">';
            echo 'alert("Payment Successful")';
            echo '</script>';

             //create order
             $order = new OrderController();
             $order->store($data);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
