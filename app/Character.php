<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function radicals()
    {
        return $this->belongsToMany(Radical::class);
    }
}
