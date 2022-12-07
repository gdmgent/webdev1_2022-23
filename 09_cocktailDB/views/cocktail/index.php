<div class="cocktails">
    <?php foreach ( $cocktails as $cocktail) {
        var_dump($cocktail);
        include BASE_DIR . '/views/cocktail/_partial/cocktail.php';
        foreach($cocktail->getIngredients() as $ingredient) {
            echo $ingredient->name;
        }
    }?>
</div>