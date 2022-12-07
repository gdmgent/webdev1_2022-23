<?php

namespace App\Controllers;
use App\Models\Restaurant;
use App\Models\Reservation;

class ReservationController extends BaseController {

    public static function index() {

        if(! isset($_SESSION['reservations'])){
            self::redirect('/');
        }
        $reservations = Reservation::getByIds($_SESSION['reservations']);

        self::loadView('/reservation/list', [
            'reservations' => $reservations            
        ]);
    }
}