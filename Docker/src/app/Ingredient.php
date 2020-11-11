<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function ingredientsRecipe(){
        return $this->hasMany('App\IngredientsRecipe','id_ingredients','id');
    }
}
