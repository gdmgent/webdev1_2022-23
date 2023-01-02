<?php
namespace App\Models;

class Genre extends BaseModel {
    protected function findBySlug($slug) {
        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `slug` = :p_slug';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute( [ ':p_slug' => $slug ] );

        $db_item = $pdo_statement->fetchObject();

        return self::castToModel($db_item);
    }
}