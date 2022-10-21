<?php
$lijst = scandir('images');
//print_r($lijst);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image browser</title>
</head>
<body>
    <?php 
    foreach($lijst as $file) {
        if ( is_file('images/' . $file) ) {
            include 'view/file_item.php';
        }
    } 
    ?>
</body>
</html>