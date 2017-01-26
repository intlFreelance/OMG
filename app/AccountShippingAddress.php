<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountShippingAddress extends Model
{
    protected $fillable = ["address"];
    protected $casts = [
        'address' => 'array'
    ];
    public $timestamps = false;
}
