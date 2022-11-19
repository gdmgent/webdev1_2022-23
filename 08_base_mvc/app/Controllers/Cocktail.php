<?php

namespace App\Controllers;
use App\Models\Cocktail as Cocktail;

class CocktailController extends BaseController {

    public static function index () {
        self::loadView('/cocktail/index', [
            'cocktails' => Cocktail::getAll()
        ]);
    }

    public static function detail ($id) {
        self::loadView('/cocktail/detail', [
            'cocktail' => Cocktail::find($id)
        ]);
    }

}