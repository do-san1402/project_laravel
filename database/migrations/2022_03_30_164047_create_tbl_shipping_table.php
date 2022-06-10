<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipping', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table ->string('name_shipping', 100);
            $table ->string('email_shipping', 150);
            $table ->string('phone_shipping', 100);
            $table ->string('city_shipping', 100);
            $table ->text('address_shipping');
            $table ->string('notes_shipping', 255);
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
        Schema::dropIfExists('tbl_shipping');
    }
}
