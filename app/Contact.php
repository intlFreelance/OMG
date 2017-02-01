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
        'firstName','lastName', 'account_id', 'jobTitle', 'email', 'mainPhone', 'cellPhone', 'workPhone'
    ];
    protected $casts = ['isPrimary'=>'boolean', 'isSecondary'=>'boolean'];

    public function account(){
        return $this->belongsTo('App\Account', 'account_id');
    }
    public function getFullNameAttribute(){
        return $this->firstName ." ". $this->lastName;
    }

}
