<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'categorylist';
    public $timestamps = false; // van-e created_at és updated_at mező a táblában
    protected $fillable = [
        'name' // <-- ezek a tábla mezői
    ];
}
