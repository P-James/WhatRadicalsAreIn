<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class Radical extends Model
{
    protected $guarded = [];

    public function character()
    {
        return $this->belongsToMany(Character::class);
    }

    public function path()
    {
        return 'https://www.archchinese.com/' . $this->uri;
    }

    public function unicode()
    {
        $uri = $this->uri;

        $unicode = explode('=', $uri);
        if (count($unicode) === 1) {
            return 'no_uri';
        } else {
            return $unicode[1];
        }
    }
}
