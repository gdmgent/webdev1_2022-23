<?php
namespace App\Models;

class User extends BaseModel {

    public string $email;
    public string $password;

    public function create() {

        //echo $this->email .  ' - ' . $this->password;

        //sql INSERT INTO
        $sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';
        //prepare
        $statement = $this->db->prepare($sql);
        //execute
        $statement->execute([
            ':email' => htmlspecialchars($this->email), //XSS tegengaan
            ':password' => password_hash($this->password, PASSWORD_DEFAULT)
        ]);


        //fetch hebben we niet nodig
        $new_id = $this->db->lastInsertId();

        echo 'Nieuwe id van user is ' . $new_id;

        return $new_id;

    }

    protected function login($email, $password) {
        //sql user ophalen
        $sql = 'SELECT * FROM users WHERE email = :email';

        $stmnt = $this->db->prepare($sql);
        $stmnt->execute([
            ':email' => $email
        ]);
        $user = $stmnt->fetchObject();
        
        //check if user found and password correct
        if(isset($user->id) && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

}