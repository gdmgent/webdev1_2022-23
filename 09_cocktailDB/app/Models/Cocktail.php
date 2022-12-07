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

    public function create() {
        $sql = 'INSERT INTO cocktails (name, description, photo) 
                    VALUES (:name, :description, :photo)';

        $stmnt = $this->db->prepare($sql);
        $stmnt->execute([
            ':name' => $this->name,
            ':description' => $this->description,
            ':photo' => $this->photo,
        ]);

        $this->id = $this->db->lastInsertId();
        
        return $this->id;
    }
}