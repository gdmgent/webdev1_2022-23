<div>
    <h2><?= $car['brand'] ?> <?= $car['type'] ?></h2>
    <ul>
        <li>Fuel: <?= $car['fuel'] ?></li>
        <li>Price: <?= $car['price_from'] ?></li>
    </ul>
    <img src="cars/<?= $car['image'] ?>">
</div>