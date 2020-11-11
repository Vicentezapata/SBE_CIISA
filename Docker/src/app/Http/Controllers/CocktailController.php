<?php

namespace App\Http\Controllers;

use App\Cocktail;
use Illuminate\Http\Request;

class CocktailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cocktail = Cocktail::all();
        return $cocktail;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cocktail = new Cocktail();
        $cocktail->name = $request['name'];
        $cocktail->degrees = $request['degrees'];
        $cocktail->save();
        return  $cocktail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //METODO 1
        $cocktail = Cocktail::where('id',$request['id'])->first();
        $cocktail->name = $request['name'];
        $cocktail->degrees = $request['degrees'];
        $cocktail->save();
        //METODO 2
        //$cocktail = Cocktail::where('id',$request['id'])->update(['name'=>$request['name'],'degrees'=>$request['degrees']]);
        return $cocktail;
    }

    public function delete(Request $request)
    {
        $cocktail = Cocktail::find($request['id']);
        $cocktail->delete();
        return $cocktail;
    }

    public function getAllRecipe()
    {
        //$cocktails = Cocktail::find([$request['id']]);
        $cocktails = Cocktail::all();
        foreach ($cocktails as $cocktail) {
            $recipes = $cocktail->CocktailRecipe()->get();
            foreach ($recipes as $recipe) {
                $ingredientRecipes = $recipe->ingredientsRecipe()->get();
                foreach ($ingredientRecipes as $ingredientRecipe) {
                    $ingredientRecipe['Ingredient'] = $ingredientRecipe->ingredients()->get();
                }
                $recipe['IngredientRecipe'] = $ingredientRecipes;
            }
            $cocktail['Recipe'] = $recipes;
        }
        return $cocktails;
    }
}
/*
$controller = app()->make('App\Http\Controllers\CocktailController');
app()->call([$controller, 'getAllRecipe']);
*/
