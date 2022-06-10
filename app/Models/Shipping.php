<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'name_shipping',
        'email_shipping',
        'phone_shipping',
        'address_shipping',
        'notes_shipping',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tbl_shipping';
}
