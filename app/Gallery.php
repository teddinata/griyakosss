<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'room_packages_id', 'image',
    ];

    protected $hidden = [

    ];

    public function room_package(){
        return $this->belongsTo(RoomPackage::class, 'room_packages_id', 'id');
    }
}
