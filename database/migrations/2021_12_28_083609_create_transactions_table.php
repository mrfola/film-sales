<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('email');//The reason I'm having phone and email field even though we already link to user_id
            $table->string('phone');//is because a user can decide to use a different email and phone number for that particular transaction for whatever reason, so it essential it is stored
            $table->string('status');
            $table->integer('amount');
            $table->text('products_array');
            $table->string('currency');
            $table->string('transaction_id');
            $table->string('first_six_digits');
            $table->string('last_four_digits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
