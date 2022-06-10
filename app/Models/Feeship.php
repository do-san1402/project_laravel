<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeship extends Model
{
    use HasFactory;
    protected $fillable = [
        'fee_matp',
        'fee_maqh',
        'fee_xaid',
        'fee_feeship',
    ];
    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_feeship';
    function city() {
        return $this -> belongsTo('App\Models\City', 'fee_matp');
    }
    function province() {
        return $this -> belongsTo('App\Models\Province', 'fee_maqh');
    }
    function wards() {
        return $this -> belongsTo('App\Models\Wards', 'fee_xaid');
    }
}
