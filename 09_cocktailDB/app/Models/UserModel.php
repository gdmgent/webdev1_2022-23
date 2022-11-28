<?php
namespace App\Models;

class User extends BaseModel {

    public string $email;
    public string $password;

    public function create() {

        echo 'TODO: SQL schrijven en uitvoeren voor registratie: ';

        echo $this->email .  ' - ' . $this->password;

        //sql INSERT INTO
        //prepare
        //execute

        //fetch hebben we niet nodig
        $new_id = $this->db->lastInstertId();

        echo $new_id;

        exit;

    }
}