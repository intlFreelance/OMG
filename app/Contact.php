<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phoneNumber',
    ];
    protected $casts = ['isPrimary'=>'boolean'];

    public function account(){
        return $this->belongsTo('App\Account', 'account_id');
    }
}
