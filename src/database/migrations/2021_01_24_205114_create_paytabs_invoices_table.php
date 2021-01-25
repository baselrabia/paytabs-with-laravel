<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaytabsInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paytabs_invoices', function (Blueprint $table) {
            $table->id();

            //'order_id', 'result', 'response_code', 'pt_invoice_id','amount', "currency", "transaction_id", "card_brand", "card_first_six_digits", "card_last_four_digits"
            /*
                +"result": "The payment is completed successfully!"
                +"response_code": "100"
                +"pt_invoice_id": "548647"
                +"amount": 100
                +"currency": "USD"
                +"reference_no": "1231231"//order_id
                +"transaction_id": "740459"
                +"card_brand": "Visa"
                +"card_first_six_digits": "400000"
                +"card_last_four_digits": "0051"
            */

            $table->unsignedBigInteger('order_id');
            $table->text('result');
            $table->unsignedInteger('response_code');
            $table->unsignedInteger('pt_invoice_id')->nullable();
            $table->float('amount')->nullable();
            $table->string('currency')->nullable();
            $table->unsignedInteger('transaction_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->unsignedInteger('card_first_six_digits')->nullable();
            $table->unsignedInteger('card_last_four_digits')->nullable();



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
        Schema::dropIfExists('paytabs_invoices');
    }
}
