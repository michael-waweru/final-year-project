<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('entry_id');
            $table->string('type')->default('Payment');
            $table->string('state');
            $table->integer('year')->nullable();
            $table->json('month')->nullable();
            $table->string('payment_means');
            $table->integer('amount');
            $table->string('transaction_id')->nullable();
            $table->string('transaction_code')->nullable();
            $table->string('bank')->nullable();
            $table->integer('account')->nullable();
            $table->string('branch')->nullable();
            $table->string('cheque')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('tenant_payments');
    }
}
