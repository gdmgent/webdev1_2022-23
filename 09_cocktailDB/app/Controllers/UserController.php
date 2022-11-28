<?php

namespace App\Controllers;
use App\Models\User;

class UserController extends BaseController {

    public static function register() {
        //echo 'Dit is de register method van de user controller';

        if( isset($_POST['email']) ) {
            //echo 'TODO: User registreren';

            $user = new User();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->create();

        }

        self::loadView('/user/register', [

        ]);
    }

}