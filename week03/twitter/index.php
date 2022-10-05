<?php
include 'includes/db.php';

$searchquery = $_GET["searchquery"] ?? '';

//sql voorbereiden
$pdo_statement = $db->prepare("
SELECT * FROM message INNER JOIN users ON message.user_id = users.id
WHERE message LIKE :searchplaceholder
ORDER BY created_on DESC LIMIT 25;");
//SQL Injection tegen gaan door params te binden of meteen in de execute meegeven
//$pdo_statement->bindParam(':searchplaceholder', $searchquery);
//sql uitvoeren
$pdo_statement->execute([ ':searchplaceholder' => '%' . $searchquery . '%' ]);
//resultaat ophalen
$messages = $pdo_statement->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGM Tweets</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="messages">
        <form>
            <div class="message message-new">
            
                <div class="avatar">JD</div>

                <div class="content">
                    <textarea name="tweet"></textarea>
                    <button type="submit">Tweet</button>
                </div>
            </div>
        </form>

        <form>
            <div class="search">
                <input type="search" name="searchquery" value="<?= $searchquery; ?>">
                <button type="submit">Zoek</button>
            </div>
        </form>

        <?php
        foreach($messages as $message) {
            //echo $message['message'];
            include 'views/tweet.php';
        }
        ?>

    </div>

</div>


</body>
</html>