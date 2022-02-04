<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('identification_number')->nullable();
            $table->string('identification_doc')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            // $table->string('contact2')->nullable();

            $table->string('guarantor_fname')->nullable();
            $table->string('guarantor_lname')->nullable();
            $table->string('guarantor_id_no')->nullable();
            $table->string('guarantor_address')->nullable();
            $table->string('guarantor_contact')->nullable();
            $table->boolean('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
