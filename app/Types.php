<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $types = Types::orderBy('currency_name')->get();

        $typesForCheckboxes = [];

        foreach ($types as $currency) {
            $typesForCheckboxes[$currency['id']] = $currency->currency_name;
        }

        return $typesForCheckboxes;
    }
}
