<?php
namespace App\Models;

class Cocktail extends BaseModel {

    protected function getByPage($page = 0) {
        $page_size = 2;
        $offset = $page*$page_size;

        $sql = 'SELECT * FROM `' . $this->table . '` LIMIT ' . $offset . ', ' . $page_size;
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items);
    }
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