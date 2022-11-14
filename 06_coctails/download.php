<?php
/*
//Gets data from thecocktaildb and copy to DB

include 'libs/db.php';

for( $code = 0; $code < 26; $code++ ) {
    $letter = chr($code+97);

    $cocktails = json_decode(file_get_contents('https://www.thecocktaildb.com/api/json/v1/1/search.php?f=' . $letter));

    foreach($cocktails->drinks as $cocktail) {
        //SQL
        $sql = "INSERT INTO `cocktails` 
        (`name`, `description`, `recipe`, `alcohol_pct`, `photo`, `ref_id`)
        VALUES (:name, :description, :recipe, :alcohol_pct, :photo , :ref_id)";

        //prepare
        $stmnt = $db->prepare($sql);

        //Execute opletten met SQLInjection
        $stmnt->execute([
        ':name' => $cocktail->strDrink,
        ':description' => '',
        ':recipe' => $cocktail->strInstructions,
        ':alcohol_pct' => 0,
        ':photo' => $cocktail->strDrinkThumb,
        ':ref_id' => $cocktail->idDrink,
        ]);

        //Geen fetch nodig. Wat is de laatst toegevoegde order_id ?
        $order_id = $db->lastInsertId();
    }

}
*/