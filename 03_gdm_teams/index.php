<?php
    require 'app.php';

$sql = 'SELECT * FROM `team` inner join user_team on user_team.team_id = team.team_id WHERE `user_id` = :user_id';
$pdo_statement = $db->prepare($sql);
$pdo_statement->execute( [ ':user_id' => $current_user_id ] );
$teams =  $pdo_statement->fetchAll();


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teams</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <a href="index.php" class="brand">Teams</a>
        <div class="user">
            Hi, <?= $user->firstname; ?>
            <div class="initials"><?= $user->firstname[0] . $user->lastname[0]; ?></div>
        </div>
    </header>
    <section class="chat_list">
        <?php foreach($teams as $team){
            include 'views/team.php';
        } ?>
    </section>

</body>
</html>