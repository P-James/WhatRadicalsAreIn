<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radical extends Model
{
    public function character()
    {
        return $this->belongsToMany(Character::class);
    }
}
