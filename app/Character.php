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
        return Character::where('meaning', 'like', '%' . $query . '%')
            ->orWhere('character', $query);
    }
}
