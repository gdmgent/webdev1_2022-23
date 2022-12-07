<?php
$reservations = $_SESSION['reservations'] ?? [];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'RestoReserve' ?></title>
    <link rel="stylesheet" href="/css/style.css?v=<?= time(); ?>">
</head>
<body>
    <header>
        <a href="/" class="brand">RestoReserve</a>
        <form method="get" action="/" class="search"><input name="search" type="search" value="<?= $search ?? ''; ?>"><button type="submit">Zoeken</button></form>
       <div class="user">
           <a href="/reservations">Mijn afspraken <span class="badge"><?= count($reservations); ?></span></a>
       </div>
    </header>

    <?= $content; ?>
    
    <?php include_once  BASE_DIR . '/views/_templates/_partials/footer.php'; ?>

</body>
</html>