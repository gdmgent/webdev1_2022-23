<?php

require 'config.php';

require 'libs/db.php';


$sql = 'SELECT * FROM `user` WHERE `user_id` = :user_id';
$pdo_statement = $db->prepare($sql);
$pdo_statement->execute( [ ':user_id' => $current_user_id ] );
$user =  $pdo_statement->fetchObject();