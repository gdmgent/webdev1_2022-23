<?php
namespace App\Models;

class Album extends BaseModel {

    protected function like($album_id, $user_id) {
        $sql = 'INSERT INTO album_user (user_id, album_id) VALUES (:p_user_id, :p_album_id)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':p_user_id' => $user_id,
            ':p_album_id' => $album_id
        ]);
    }

    protected function dislike($album_id, $user_id) {
        $sql = 'DELETE FROM album_user WHERE user_id = :p_user_id AND album_id = :p_album_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':p_user_id' => $user_id,
            ':p_album_id' => $album_id
        ]);
    }

    protected function get($genre_id = null) {
        
        if($genre_id) {
            $sql = 'SELECT albums.id, albums.name, year, genre_id, image, artist_id, artists.name as artist FROM albums
            INNER JOIN artists ON albums.artist_id = artists.id
            WHERE genre_id = :p_genre_id';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute([
                ':p_genre_id' => $genre_id
            ]);
        }  else {
            $sql = 'SELECT albums.id, albums.name, year, genre_id, image, artist_id, artists.name as artist FROM albums
            INNER JOIN artists ON albums.artist_id = artists.id';
            $pdo_statement = $this->db->prepare($sql);
            $pdo_statement->execute();
        }

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items);
    }

    protected function findById($id){
        $sql = 'SELECT albums.id, albums.name, year, genre_id, image, artist_id, artists.name as artist FROM albums
        INNER JOIN artists ON albums.artist_id = artists.id
        WHERE albums.id = :p_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':p_id' => $id
        ]);

        $db_item = $pdo_statement->fetch(); 
        
        return self::castToModel($db_item);
    }

    public function getTracks(){
        $sql = 'SELECT * FROM tracks WHERE album_id = :p_album_id';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':p_album_id' => $this->id
        ]);

        $db_items = $pdo_statement->fetchAll(); 
        
        return self::castToModel($db_items, 'App\Models\Track');
    }
}