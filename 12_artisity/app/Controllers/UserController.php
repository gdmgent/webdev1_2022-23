<?php

namespace App\Controllers;
use App\Models\Album;
use App\Models\Genre;

class UserController extends BaseController {

    public static function favorites () {
        $favorites = getCurrentUser()->getFavorites();

        self::loadView('/album/list', [
            'albums' => $favorites,
            'genres' => Genre::getAll(),
            'current_genre' => null
        ]);
    }

}