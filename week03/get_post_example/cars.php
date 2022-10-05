<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Finder</title>
</head>
<body>
    <h1>Car Finder</h1>

    <?php
    include 'data.php';

    foreach($cars as $car) { 
        include 'view/car_item.php';
    }
    ?>

</body>
</html>