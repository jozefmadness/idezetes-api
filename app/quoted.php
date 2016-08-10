<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quoted extends Model
{
    protected $table = 'quoted';
    public $timestamps = false; // van-e created_at és updated_at mező a táblában
    protected $fillable = [
        'name' // <-- ezek a tábla mezői
    ];
}
