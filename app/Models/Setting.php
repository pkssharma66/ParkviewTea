<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=[
        'site_name',
        'logo',
        'favicon',
        'email',
        'phone',
        'whatsapp',
        'address',
        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'twitter',
        'footer_about',
        'meta_description',
        'meta_keywords'
    ];
}