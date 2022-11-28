<?php

namespace App\Controllers;
use App\Models\Cocktail;
use App\Models\User;

class CocktailController extends BaseController {

    public static function index () {
        $cocktails = Cocktail::getAll();
        //$users = User::getAll();

        self::loadView('/cocktail/index', [
            'cocktails' => $cocktails
        ]);
    }

    public static function detail ($id) {
        $cocktail = Cocktail::find($id);

        self::loadView('/cocktail/detail', [
            'cocktail' => $cocktail,
            'ingredients' => $cocktail->getIngredients()
        ]);
    }

}