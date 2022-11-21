<?php

namespace App\Controllers;
use App\Models\Cocktail as Cocktail;

class CocktailController extends BaseController {

    public static function index () {
        $cocktails = Cocktail::getAll();

        //tussenbewerking op die data

        self::loadView('/cocktail/index', [
            'cocktails' => $cocktails
        ]);
    }

    public static function detail ($id) {
        self::loadView('/cocktail/detail', [
            'cocktail' => Cocktail::find($id)
        ]);
    }

}