<?php
namespace App\Models;

class User extends BaseModel {
   public function getFullName() {
       return $this->firstname . ' ' . $this->lastname;
   }

   public function getFavorites() {
         $sql = 'SELECT albums.id, albums.name, year, genre_id, image, artist_id, artists.name as artist FROM albums
         INNER JOIN artists ON albums.artist_id = artists.id
         INNER JOIN album_user ON albums.id = album_user.album_id
         WHERE album_user.user_id = :p_user_id';
         $pdo_statement = $this->db->prepare($sql);
         $pdo_statement->execute([
              ':p_user_id' => $this->id
         ]);
    
         $db_items = $pdo_statement->fetchAll(); 
         
         return self::castToModel($db_items, 'App\Models\Album');
   }

   public function getFavoriteIds() {
    $sql = 'SELECT album_id FROM album_user WHERE user_id = :p_user_id';
    $pdo_statement = $this->db->prepare($sql);
    $pdo_statement->execute([
         ':p_user_id' => $this->id
    ]);

    $db_items = $pdo_statement->fetchAll(\PDO::FETCH_COLUMN, 0); 
    
    return $db_items;
}

}