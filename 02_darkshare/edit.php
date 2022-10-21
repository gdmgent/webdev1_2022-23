<?php
include_once 'config.php';
//Filename ophalen uit de querystring
$filename = $_GET["file"];
//echo $filename;

//Inhoud ophalen van dat bestand:
$content = file_get_contents($filename); 

//POST opvangen van het formulier en inhoud wegschrijven via
if( isset($_POST['content']) ) {
    $content = $_POST['content'];
    file_put_contents(UPLOAD_PATH . '/' . $filename, $content);
}

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
<section>
<form method="POST">
    <textarea rows='40' name="content" style="width:100%"><?= $content; ?></textarea>
    <input type="hidden" name="file">
    <input type="submit" value="Update" class="btn">
    <a href="index.php">Annuleer</a>
</form>
</section>

</body>
</html>
