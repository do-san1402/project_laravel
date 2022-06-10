<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class AdminUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_email',
        'admin_password',
        'admin_name',
        'admin_phone',
    ];
    protected $table = 'admin_user';
    function roles() {
        return $this -> belongsTomany('App\Models\Roles');
    }
    function hasAnyRoles($roles) {
        return null !== $this -> roles() -> whereIn('name', $roles) -> first();
    }
    function hasRoles($roles) {
        return null !== $this -> roles() ->where('name' , $roles) -> first();
    }
}
