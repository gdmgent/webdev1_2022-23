<a href="/restaurant/<?= $reservation->restaurant_id ?>" class="list-item">
    <img src="/images/restaurant/<?= $reservation->image ?>">
    <div class="name"><?= $reservation->name ?> <sup><?= str_repeat('*', $reservation->stars) ?></sup></div>
    <div class="city"><?= $reservation->date ?></div>
</a>