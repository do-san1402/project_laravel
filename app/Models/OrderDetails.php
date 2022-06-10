<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'order_code',
        'product_price',
        'product_coupon',
        'product_price',
        'product_sales_qty',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_order_detail';
    function product() {
        return $this -> belongsTo('App\Models\Product', 'product_id');
    }
}
