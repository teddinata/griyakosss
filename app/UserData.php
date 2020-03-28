<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'identity_card', 'phone', 'room_number',
        'checkin', 'duration', 'tagihan'
    ];

    // protected $hidden = [

    //];
}
