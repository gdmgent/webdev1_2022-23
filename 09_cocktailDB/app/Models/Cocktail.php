<?php
namespace App\Models;

class Cocktail extends BaseModel {

    public function getIngredients() {
        $sql = 'SELECT * FROM `ingredients` INNER JOIN `cocktail_ingredient` WHERE `cocktail_id` = :p_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $this->id ] );

        $db_item = $pdo_statement->fetchObject();

        return Ingredient::castToModel($db_item);
    }
}