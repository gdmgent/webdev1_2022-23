<?php

class BaseModel {

    public static function getAllItems($table) {
        global $db;

        $sql = 'SELECT * FROM ' . $table;
        $statement = $db->prepare($sql);
        $statement->execute();
        $items = $statement->fetchAll();
        return $items;
    }

}