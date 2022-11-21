<h1><?= $cocktail->name; ?></h1>
<img src="/images/cocktails/<?= $cocktail->photo; ?>">
<p><?= $cocktail->description; ?></p>
<h2>Ingredients</h2>
<?php print_r($ingredients); ?>
<h2>Recept</h2>
<?= $cocktail->recipe; ?>