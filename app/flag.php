<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quoted extends Model
{
    protected $table = 'flag';
    protected $fillable = [
        'name', 'value' // <-- ezek a tábla mezői
    ];
}
