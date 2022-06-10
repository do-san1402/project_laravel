<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer',
        'shipping_id',
        'order_status',
        'order_code',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_order';
    
}
