<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'room_packages_id',  'users_id', 'transaction_total',
        'transaction_status', 'room_types_id'
    ];

    protected $hidden = [];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function room_package()
    {
        return $this->belongsTo(RoomPackage::class, 'room_packages_id', 'id');
    }
    public function room_type()
    {
        return $this->belongsTo(RoomType::class, 'room_types_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id', 'avatar');
    }
}
