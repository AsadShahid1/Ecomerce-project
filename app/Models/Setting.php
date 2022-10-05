<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'mobile_number',
        'instagram',
        'email',
        'twitter',
        'facebook',
        'policy',
        'terms',
        'pay_mode',
        'paypal_user',
        'paypal_password',
        'paypal_secret',
    ];
}
