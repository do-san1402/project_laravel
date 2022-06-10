<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_phuongxa',
        'maqh',
        'type',
    ];
    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';
}
