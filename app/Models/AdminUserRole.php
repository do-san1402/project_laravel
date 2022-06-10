<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_user_id',
        'role_id',
    ];
    protected $table = 'admin_user_roles';
}
