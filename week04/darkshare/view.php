<?php
include_once 'config.php';
//Filename ophalen uit de querystring
$filename = $_GET["file"];
//echo $filename;

//Inhoud ophalen van dat bestand:
$content = file_get_contents($filename); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DarkShare</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>DarkShare</h1>

<h2>View file: <?= htmlspecialchars($filename); ?></h2>

<?= htmlspecialchars( $content ); ?>

</body>
</html>
