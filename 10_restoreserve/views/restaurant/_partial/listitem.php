<a href="/restaurant/<?= $restaurant->id ?>" class="list-item">
    <img src="/images/restaurant/<?= $restaurant->image ?>">
    <div class="name"><?= $restaurant->name ?> <sup><?= str_repeat('*', $restaurant->stars) ?></sup></div>
    <div class="city"><?= $restaurant->city ?></div>
</a>