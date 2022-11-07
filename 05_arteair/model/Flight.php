<?php 

class Flight {

    public $from;
    public $to;

    public function name() {
        return $this->from_name . ' -> ' . $this->to_name;
    }

    public static function getById( $id ){
        global $db;

        $sql = "SELECT flight.*, af.name as from_name, at.name as to_name, aircraft.*
                FROM flight
                INNER join aircraft on flight.aircraft_id = aircraft.aircraft_id
                INNER JOIN airport af ON flight.from = af.airport_id
                INNER JOIN airport at ON flight.to = at.airport_id
                WHERE flight_id = :flight_placeholder";

        //prepare
        $statement = $db->prepare($sql);
        //execute
        $statement->execute([
            ':flight_placeholder' => $id
        ]);
        //fetch
        $flight = $statement->fetch();

        return $flight;
    }

    public static function getAll()
    {
        global $db; //$db var halen uit index.php

        $sql = "SELECT flight.*, af.name as from_name, at.name as to_name, aircraft.*
        FROM flight
        INNER join aircraft on flight.aircraft_id = aircraft.aircraft_id
        INNER JOIN airport af ON flight.from = af.airport_id
        INNER JOIN airport at ON flight.to = at.airport_id";

        //prepare
        $statement = $db->prepare($sql);
        //execute
        $statement->execute();
        //fetch
        $flights = $statement->fetchAll();

        return $flights;
    }

}