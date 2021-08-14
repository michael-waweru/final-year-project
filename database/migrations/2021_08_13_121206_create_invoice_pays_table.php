<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pays', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('invoice_id');
            $table->integer('entry_id');
            $table->string('invoicecounter');
            $table->string('type')->default('invoice-pay');
            $table->integer('amount');
            $table->integer('balance');
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
        Schema::dropIfExists('invoice_pays');
    }
}
