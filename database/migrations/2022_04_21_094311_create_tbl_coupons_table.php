<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name', 150);
            $table->string('coupon_code', 50);
            $table->string('coupon_times', 50);
            $table->string('coupon_options', 50);
            $table->string('coupon_conditions', 10);
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
        Schema::dropIfExists('tbl_coupons');
    }
}
