<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_times',
        'coupon_options',
        'coupon_conditions',
    ];
    protected $table = 'tbl_coupons';
}
