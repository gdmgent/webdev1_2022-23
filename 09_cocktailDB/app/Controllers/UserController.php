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

    public static function all() {
        $all = User::getAll();

        foreach($all as $user) {
            echo $user->email;
        }
    }

    public static function login() {
        //echo 'pagina aanmaken login';

        if(isset($_POST['email'])) {
            //echo 'TODO: login';
            $user = User::login($_POST['email'], $_POST['password']);
            if($user) {
                $_SESSION['user_id'] = $user->id; 
                self::redirect('/', 302);
            } else {
                echo 'wrong pwd';
            }
        }

        self::loadView('/user/login', [

        ]);
    }

}