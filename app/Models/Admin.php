<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable=[
        'name',
        'email',
        'password',
        'mobile',
        'photo',
        'role',
        'status'
    ];

    protected $hidden=[
        'password',
        'remember_token'
    ];
}