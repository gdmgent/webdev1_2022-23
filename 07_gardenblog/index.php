<?php

include 'libs/db.php';

$search = $_GET['q'] ?? '';
$params = [];

if ($search) {
    $sql = "SELECT * FROM `articles` WHERE title LIKE :q OR intro LIKE :q OR content LIKE :q ORDER BY created_at DESC LIMIT 20";
    $params['q'] = "%$search%";
} else {
    $sql = "SELECT * FROM `articles` ORDER BY created_at DESC LIMIT 21";
}
//prepare
$stmnt = $db->prepare($sql);
//Execute opletten met SQLInjection
$stmnt->execute($params);

$articles = $stmnt->fetchAll(PDO::FETCH_CLASS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GardenBlog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <a class="brand" href="index.php">GardenBlog</a>
        <form method="GET">
            <input type="search" name="q" value="<?= $search ?>">
            <button type="submit">Zoek</button>
        </form>
    </header>
    <main class="articles container">
    <?php foreach ( $articles as $article) {
        include 'view/article.php';
    }?>
    </main>
</body>
</html>