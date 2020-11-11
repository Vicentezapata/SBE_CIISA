<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    public function CocktailRecipe(){
        return $this->hasMany('App\Recipe','id_cocktail','id');
    }
}
