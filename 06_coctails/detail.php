<?php

include 'libs/db.php';

$id = $_GET['id'] ?? 0;

//ophalen van de cocktail
$sql = "SELECT * FROM `cocktails` WHERE id = :id";
//prepare
$stmnt = $db->prepare($sql);
//Execute opletten met SQLInjection
$stmnt->execute([ ':id' => $id ]);

$cocktail = $stmnt->fetchObject();

//ophalen van de ingredienten
$sql = "SELECT * FROM `cocktail_ingredient` INNER JOIN `ingredients` ON `ingredient_id` = `id`  WHERE `cocktail_id` = :id";
$stmnt = $db->prepare($sql);
$stmnt->execute([ ':id' => $id ]);
$ingredients = $stmnt->fetchAll(PDO::FETCH_CLASS);

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
    <h1><?= $cocktail->name; ?></h1>
    <img src="images/cocktails/<?= $cocktail->photo; ?>">
    <p><?= $cocktail->description; ?></p>
    <h2>Ingrediënten</h2>
    <?php include 'view/ingredient_list.php'; ?>
    <h2>Recept</h2>
    <?= $cocktail->recipe; ?>
</body>
</html>