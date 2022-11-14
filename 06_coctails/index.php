<?php

include 'libs/db.php';

$sql = "SELECT * FROM `cocktails`";
//prepare
$stmnt = $db->prepare($sql);
//Execute opletten met SQLInjection
$stmnt->execute([]);

$cocktails = $stmnt->fetchAll(PDO::FETCH_CLASS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktails</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cocktails">
    <?php foreach ( $cocktails as $cocktail) {
        include 'view/cocktail.php';
    }?>
    </div>
</body>
</html>