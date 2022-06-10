<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_desc',
        'meta_keyword',
        'category_status',
    ];
    protected $table = 'categry_product';   
}
