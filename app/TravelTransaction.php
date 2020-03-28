<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'users_id', 'travel_transaction_total',
        'travel_transaction_status'
    ];

    protected $hidden = [

    ];

    public function details(){
        return $this->hasMany(TravelTransactionDetail::class, 'travel_transactions_id', 'id');
    }

    public function travel_package(){
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
