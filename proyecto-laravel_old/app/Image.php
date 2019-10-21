<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    //Relación One To Many
    public function comments(){
        return $this->hasMany('\App\Comment'); //Uno a muchos
    }

    //Relación One To Many
    public function likes(){
        return $this->hasMany('\App\Like'); //Unos a muchos
    }

    public function user(){
        return $this->belongsTo('\App\User','user_id'); //Muchos a uno
    }
}
