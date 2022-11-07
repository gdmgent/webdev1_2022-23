<?php
include 'includes/db.php';
include 'model/Flight.php';

$flight_id = $_GET['flight_id'];

$flight = Flight::getById( $flight_id );

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArteAir -> Order</title>

    <link rel="stylesheet" href="./css/main.css">

</head>
<body>
<header>
    <a class="brand" href="index.php">ARTE <small>air</small></a>
</header>

<section>
<h1><?= $flight['from_name']; ?> -> <?= $flight['to_name']; ?></h1>
<h2><?= $flight['date']; ?></h2>
€ <?= $flight['ticket_price']; ?> &bull; <?= $flight['aircraft_code']; ?> &bull; <?= $flight['model']; ?>

    <form method="POST" action="./place_order.php">
<div class="order_form">
    <div class="seats">
        <?php for( $i = 1 ; $i <= $flight['rows'] ; $i++ ) : ?>
            <div class="row">
                <span><?= $i; ?></span>
                <?php $layout = str_split($flight['row_layout']); ?>
                <?php
                //for ( $seat = 0; $seat < count($layout) ; $seat ++) : 
                foreach( $layout as $seat) : ?>
                    <?php if ( $seat == '_') : ?>
                        <div class="spacer"></div>
                    <?php else : ?>
                        <!--<div class="seat seat-ordered">A</div>-->
                        <div class="seat">
                            <?= $seat; ?>
                            <input type="checkbox" name="seats[]" value="<?= $i . $seat ?>">
                        </div>      
                    <?php endif; ?>
                <?php endforeach;
                //endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
    <div class="form">
        Uw voornaam:   <input type="text" name="firstname" >  <br>
        Uw naam:   <input type="text" name="lastname">  <br>
        Uw e-mail:   <input type="text" name="email" >  <br>
        <input type="hidden" name="flight_id" value="TODO">
        <button type="submit">Bestelling afwerken</button>
    </div>                        
    </div>  
</form>
</section>
</body>
</html>