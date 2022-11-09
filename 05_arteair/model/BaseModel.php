<?php

class BaseModel {

    public static function find($id) {

    }
    
    public static function getAll() {
        global $db;

        $table = strtolower( get_called_class() );

        $sql = "SELECT * FROM `$table`";
        $statement = $db->prepare($sql);
        $statement->execute();
        $items = $statement->fetchAll();
        return $items;
    }

}