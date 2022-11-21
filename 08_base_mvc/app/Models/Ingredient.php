<?php
namespace App\Models;

class Ingredient extends BaseModel {

    protected function getByCocktailId($id) {
        $sql = 'SELECT * FROM `ingredients` INNER JOIN `cocktail_ingredient` WHERE `cocktail_id` = :p_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_item = $pdo_statement->fetchObject();

        return self::castToModel($db_item);
    }

}