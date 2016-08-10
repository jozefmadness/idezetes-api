<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quotes extends Model
{
    protected $table = 'quotelist';
    public $timestamps = false; // van-e created_at és updated_at mező a táblában
    protected $fillable = [
        'quote', 'category', 'quoted' // <-- ezek a tábla mezői
    ];
}
