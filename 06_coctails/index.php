<?php

CONST DB_DSN = 'mysql:dbname=cocktail;host=127.0.0.1;port=3306';
CONST DB_USER = 'root';
CONST DB_PWD = 'secret';
//open DB
$db = new PDO(DB_DSN, DB_USER, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$sql = "SELECT * FROM `cocktails`";
//prepare
$stmnt = $db->prepare($sql);

//Execute opletten met SQLInjection
$stmnt->execute([]);

$cocktails = $stmnt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cocktails">
    <?php foreach ( $cocktails as $cocktail) {
        $cocktail = (object) $cocktail;
        include 'view/cocktail.php';
    }?>
    </div>
</body>
</html>