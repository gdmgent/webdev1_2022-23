<?php
namespace App\Models;

class Reservation extends BaseModel {

    protected function getByIds($ids){
        
        $placeholder = str_repeat('?,', count($ids));
        $placeholder = substr($placeholder, 0, strlen($placeholder)-1);
    
        $sql = "SELECT * FROM reservations 
        INNER JOIN restaurants ON reservations.restaurant_id = restaurants.id
        WHERE reservations.id IN ($placeholder)";

        $statement = $this->db->prepare($sql);

        if($statement) {
            $statement->execute($ids);
            $reservations = $statement->fetchAll();
            return self::castToModel($reservations); //array -> reservation objects
        } else {
            echo 'Unable to create statement';
        }
    }
    public function create(){
        //sql query schrijven, uitvoeren
        //echo 'DO SQL INSERT for ' . $this->name;
        $sql = "INSERT INTO reservations (`restaurant_id`, `date`, `time`, `name`, `email`, `number_of_people`, `remark`)
                VALUES (:restaurant_id, :date, :time, :name, :email, :number_of_people, :remark)";

        $statement = $this->db->prepare($sql);
        if($statement) {
            $statement->execute([
                ':restaurant_id' => $this->restaurant_id,
                ':date' => $this->date, 
                ':time' => $this->time, 
                ':name' => $this->name, 
                ':email' => $this->email, 
                ':number_of_people' => $this->number_of_people,
                ':remark' => $this->remark
            ]);

            $this->id = $this->db->lastInsertId();
        } else {
            echo 'Unable to create statement';
        }
    }
}