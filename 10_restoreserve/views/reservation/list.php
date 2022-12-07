<section class="list">
<?php
    $count = 0;
    foreach($reservations as $reservation) {
        $count++;
        include BASE_DIR . '/views/reservation/_partial/listitem.php';
    }
    if($count == 0) {
        echo "<h1>Geen restaurants gevonden voor de zoekopdracht '$search'</h1>";
    } ?>
</section>