<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientsRecipe extends Model
{
    public function ingredients(){
        return $this->hasMany('App\Ingredient','id','id_ingredients');
    }
}
