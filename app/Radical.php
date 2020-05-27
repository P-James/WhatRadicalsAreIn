<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radical extends Model
{
    protected $guarded = [];

    public function character()
    {
        return $this->belongsToMany(Character::class);
    }
}
