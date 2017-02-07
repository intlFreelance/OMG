<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name', 'dba', 'taxID', 'billingAddress', 'shippingAddressSameAsBilling', 'phone1', 'phone2', 'fax', 'email', 'website', 'notes'];
    protected $casts = [
        'billingAddress' => 'array',
        'shippingAddressSameAsBilling'=>'boolean',
        'taxID' => 'array',
        'notes'=>'array',
    ];
    public function primarySalesRep()
    {
        return $this->belongsTo('App\User', 'primarySalesRep_id');
    }
    public function secondarySalesRep()
    {
        return $this->belongsTo('App\User', 'secondarySalesRep_id');
    }
    public function contacts(){
        return $this->hasMany('App\Contact', 'account_id');
    }
    public function shippingAddresses(){
        return $this->hasMany('App\AccountShippingAddress', 'account_id');
    }
}
