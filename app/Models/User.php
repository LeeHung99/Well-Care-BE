<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name',
        'password',
        'phone',
        'email',
        'role',
        'address',
    ];

    public function comment(){
        return $this->hasMany(Comments::class, 'id_user');
    }
}
