<?php

namespace App\Controllers;
use App\Models\Cocktail;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;

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

    public static function create () {
        if(isset($_POST['name'])) {
            $filename = '';
            if(isset($_FILES['image'])) {
                //Foto verplaatsen naar public
                $current_filename = $_FILES['image']['name'];
                $current_filename_parts = pathinfo($current_filename);
                $filename = uniqid() . '.' . $current_filename_parts['extension']; // new name with uniqueid.jpg
                move_uploaded_file(
                    $_FILES['image']['tmp_name'], 
                    BASE_DIR . '/public/images/cocktails/' . $filename);
                //Get Image instance of the photo
                $image = Image::make(BASE_DIR . '/public/images/cocktails/' . $filename);
                //Resize to medium: 1000px
                $image->resize(1000, null, function ($constraint) { $constraint->aspectRatio(); });
                $image->save(BASE_DIR . '/public/images/cocktails/medium/' . $filename);
                //Resize to small: 400px
                $image->resize(400, null, function ($constraint) { $constraint->aspectRatio(); });
                $image->save(BASE_DIR . '/public/images/cocktails/small/' . $filename);
            }
            //Toevoegen aan DB
            $cocktail = new Cocktail();
            $cocktail->name = $_POST['name'];
            $cocktail->description = $_POST['description'];
            $cocktail->photo = $filename;
            $cocktail->create();

         }


        self::loadView('/cocktail/create', [

        ]);
    }

}