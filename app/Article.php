<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function types()
    {
        return $this->belongsToMany('App\Types')->withTimestamps();
    }
}
