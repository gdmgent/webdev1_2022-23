<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .rainbow {
            display: flex;
        }
        .rainbow div {
            width:1px;
            height: 50vh;
        }
    </style>
</head>
<body>

<form method="GET">
    Uw voornaam:
    <input type="text" name="firstname">
    <button type="submit">Verstuur</button>
</form>

    <h1>
    <?php
    echo "Hello World";
    //echo phpinfo();
    ?>
    </h1>

    <?php 

    var_dump($_GET);

    //dubbel vraagteken is een if else in een korte notatie
    $naam = $_GET['firstname'] ?? 'bezoeker';
    echo '<h2>Hallo ' . $naam . '</h2>'; 
    echo "<h2>Hallo $naam</h2>"; 
    //echo '<h2>Hallo $naam</h2>'; 

    $colors = ['red', 'green', 'blue'];

    //inhoud op het scherm plaatsen tijdens DEV
    //print_r($colors);
    //var_dump($colors);

    foreach ($colors as $color) {
        echo "<div style='background:$color;'>$color</div>";
    }

    foreach ($colors as $key => $color) {
        echo "<div style='background:$color;'>$key => $color</div>";
    }

    echo '<div class="rainbow">';
    for ($h=0; $h < 360; $h++) { 
        echo "<div style='background: hsl($h, 100%, 50%)'></div>";
    }
    echo '</div>';
    ?>


<li><a href="index.php?firstname=Jan">Zeg hallo tegen Jan</a></li>
<li><a href="index.php?firstname=Piet">Zeg hallo tegen Piet</a></li>
<li><a href="index.php?firstname=Els">Zeg hallo tegen Els</a></li>
<li><a href="index.php?firstname=Tine">Zeg hallo tegen Tine</a></li>
</body>
</html>

