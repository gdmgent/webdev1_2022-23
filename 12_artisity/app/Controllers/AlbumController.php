<?php

namespace App\Controllers;
use App\Models\Album;
use App\Models\Genre;

class AlbumController extends BaseController {

    public static function index ($genre_slug = null) {
        if($genre_slug) {
            $genre = Genre::findBySlug($genre_slug);
            $albums = Album::get($genre->id);
        } else {
            $albums = Album::get();
        }
        $genres = Genre::getAll();

        self::loadView('/album/list', [
            'albums' => $albums,
            'genres' => $genres,
            'current_genre' => $genre ?? null
        ]);
    }

    public static function detail ($id) {
        $album = Album::findById($id);

        self::loadView('/album/detail', [
            'album' => $album,
            'genres' => Genre::getAll(),
            'current_genre' => null
        ]);
    }

}