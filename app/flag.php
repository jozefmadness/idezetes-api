<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Flag extends Model
{
    protected $table = 'flag';
    public $timestamps = false; // van-e created_at és updated_at mező a táblában
    protected $fillable = [
        'name', 'value' // <-- ezek a tábla mezői
    ];
}
