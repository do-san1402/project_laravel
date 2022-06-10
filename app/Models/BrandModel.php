<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    // public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'brand_name',
        'brand_desc',
        'brand_status',
        'meta_keyword',
    ];
    protected $table = 'brand_product';

}
