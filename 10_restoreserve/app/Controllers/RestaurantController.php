<?php

namespace App\Controllers;
use App\Models\Restaurant;
use App\Models\Reservation;

class RestaurantController extends BaseController {

    public static function index() {

        $search = $_GET['search'] ?? '';
        
        if($search) {
            $restaurants = Restaurant::search($search);
        } else {
            $restaurants = Restaurant::getAll();
        }

        self::loadView('/restaurant/list', [
            'restaurants' => $restaurants,
            'search' => $search
            
        ]);
    }

    public static function detail($id) {

        if( isset($_POST['make_reservation'] )) {
            //print_r($_POST);
            //Formvalidatie

            $reservation = new Reservation();
            $reservation->restaurant_id = $id;
            $reservation->date = $_POST['date'];
            $reservation->time = $_POST['time'];
            $reservation->name = $_POST['name'];
            $reservation->email = $_POST['email'];
            $reservation->number_of_people = $_POST['number_of_people'];
            $reservation->remark = $_POST['remark'];
            $reservation->create();

            $my_reservations = $_SESSION['reservations'] ?? [];

            $my_reservations[] = $reservation->id;
            $_SESSION['reservations'] = $my_reservations;

            self::redirect('/reservations');
            exit;
        }

        $restaurant = Restaurant::find($id);

        self::loadView('/restaurant/detail', [
            'restaurant' => $restaurant
        ]);
    }
}