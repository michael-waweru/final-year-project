<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_refunds', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_id');
            $table->integer('landlord_id');
            $table->integer('entry_id');
            $table->string('type')->default('refund');
            $table->integer('amount');
            $table->string('refund_method');
            $table->string('bank')->nullable();
            $table->integer('account')->nullable();
            $table->string('branch')->nullable();
            $table->string('cheque')->nullable();
            $table->string('attachment')->nullable();
            $table->string('transaction_code')->nullable();
            $table->text('description')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('payment_refunds');
    }
}
