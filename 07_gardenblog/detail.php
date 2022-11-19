<?php

setlocale(LC_ALL, 'nl_NL');

include 'libs/db.php';

$slug = $_GET['slug'] ?? 0;

//ophalen van de cocktail
$sql = "SELECT * FROM `articles` WHERE slug = :slug";
//prepare
$stmnt = $db->prepare($sql);
//Execute opletten met SQLInjection
$stmnt->execute([ ':slug' => $slug ]);

$article = $stmnt->fetchObject();

//ophalen van de ingredienten
$sql = "SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`user_id` = `users`.`id`  WHERE `article_id` = :id";
$stmnt = $db->prepare($sql);
$stmnt->execute([ ':id' => $article->id ]);
$comments = $stmnt->fetchAll(PDO::FETCH_CLASS);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocktails</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <a class="brand" href="index.php">GardenBlog</a>
    <form method="GET" action="index.php">
        <input type="search" name="q">
        <button type="submit">Zoek</button>
    </form>
</header>
<main class="article_detail container">
    <h1><?= $article->title; ?></h1>
    <div class="intro"><?= $article->intro; ?></div>
    <?= $article->content; ?>

</main>
<div class="comments">
    <div class="container">
    <h2>Reacties</h2>
    <?php include 'view/comment_list.php'; ?>
    </div>
</div>
   
</body>
</html>