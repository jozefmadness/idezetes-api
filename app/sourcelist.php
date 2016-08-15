<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class sourcelist extends Model
{
    protected $table = 'sourcelist';
    public $timestamps = false; // van-e created_at és updated_at mező a táblában
    protected $fillable = [
        'name' // <-- ezek a tábla mezői
    ];
}
