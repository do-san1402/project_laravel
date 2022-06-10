<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'category_id',
        'brand_id',
        'product_desc',
        'meta_keyword',
        'product_price',
        'product_image',
        'product_status',
        'product_image_sp_1',
        'product_image_sp_2',
        'product_image_sp_3',
        'product_cpu',
        'product_ram',
        'product_hard_drive',
        'product_graphics_card',
        'product_screen',
        'product_connector',
        'product_sound',
        'product_keyboard',
        'product_lan',
        'product_wifi',
        'product_bluetooth',
        'product_webcam',
        'product_operating_system',
        'product_pin',
        'product_weight',
        'product_color',
        'product_size',
    ];
    protected $table = 'tbl_product';
}
