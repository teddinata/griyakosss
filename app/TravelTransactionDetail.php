<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelTransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_transactions_id', 'username', 'nationality', 'job', 'checkin' 
    ];

    protected $hidden = [

    ];

    

    public function travel_transaction(){
        return $this->belongsTo(TravelTransaction::class, 'travel_transactions_id', 'id');
    }

    

}
