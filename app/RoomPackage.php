<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug','location', 'about',  'type', 'price'
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'room_packages_id', 'id');
    }
    public function facilities(){
        return $this->hasMany(Facilities::class, 'room_packages_id', 'id');
    }
    public function room_types(){
        return $this->hasMany(RoomType::class, 'room_packages_id', 'id');
    }
}
