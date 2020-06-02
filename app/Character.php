<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $guarded = [];

    public function radicals()
    {
        return $this->belongsToMany(Radical::class);
    }

    public static function search($query)
    {
        // return static::where('character', 'like', '%' . $query . '%');
        return empty($query) ? static::query()
            : static::where('character', 'like', '%' . $query . '%');
        // ->orWhere('email', 'like', '%'.$query.'%');
    }
}
