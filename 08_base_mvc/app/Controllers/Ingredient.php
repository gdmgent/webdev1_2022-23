<?php

namespace App\Controllers;
use App\Models\Cocktail as Cocktail;
use App\Models\Ingredient;

class IngredientController extends BaseController {

    public static function index () {
        $ingredients = Ingredient::getAll();
        var_dump($ingredients);
        //Todo: load view
    }

}