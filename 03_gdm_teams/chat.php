<?php
    require 'app.php';

$team_id = $_GET['team_id'] ?? 1;

if(isset($_POST['new_message'])) {
    //insert new message

    $sql = 'INSERT INTO `message` (user_id, message, created_on, team_id) VALUES (:user_id, :message, :created_on, :team_id)';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ 
        ':user_id' => $current_user_id,
        ':team_id' => $team_id,
        ':message' => $_POST['new_message'],
        ':created_on' => date("Y-m-d H:i:s"),
        ] );
    
}

$sql = 'SELECT * FROM `team` WHERE `team_id` = :team_id';
$pdo_statement = $db->prepare($sql);
$pdo_statement->execute( [ ':team_id' => $team_id ] );
$team =  $pdo_statement->fetchObject();

$sql = 'SELECT * FROM `message` INNER JOIN user on user.user_id = message.user_id WHERE `team_id` = :team_id ORDER BY created_on asc';
$pdo_statement = $db->prepare($sql);
$pdo_statement->execute( [ ':team_id' => $team_id ] );
$messages =  $pdo_statement->fetchAll();

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
        <a href="index.php" class="brand">&laquo;</a>
        <div class="team"><?= $team->name; ?></div>
        <div class="user">
            Hi, <?= $user->firstname; ?>
            <div class="initials"><?= $user->firstname[0] . $user->lastname[0]; ?></div>
        </div>
    </header>
    <section class="chat">
        <?php foreach($messages as $message)  {
            include 'views/message.php';
        } ?>

        <form method="POST">
            <div class="inner">
                <input type="text" name="new_message">
                <input type="submit" value="Send">
            </div>
        </form>
    </section>
    
    <script>
        var scrollingElement = document.body;
        scrollTo(0, scrollingElement.scrollHeight);
    </script>

</body>
</html>