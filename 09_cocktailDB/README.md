# Base MVC

Installeer de nodige packages via composer.

```
composer install
```

Applicatie opstarten via php
```
cd public
php -S localhost:8888
```
Let op: bij mac uitvoeren met `sudo`

## Router

Nieuwe pagina's moeten aangemaakt worden via de router class. De routes kunnen aangemaakt worden in `app.php`

Hier bouw je de url op en stuur je deze door naar de desbetreffende controller en method.

bv:

```
$router->get('/cocktail/(\d+)', 'App\Controllers\CocktailController@detail');
```

## Controller

Deze controller stuurt dus de request door naar de desbetreffende controller met bijhorende method CocktailController@detail wil dus zeggen dat we de method `detail` aanroepen in de `CocktailController`.

Een controller staat dus in voor het bekijken van de response en het versturen van de uiteindelijke response.

Je kan hier validatie doen van data, formulieren.
Ophalen van data uit cookies of uit de session.

Afhankelijk van de request zal de controller dan de data ophalen via een model.

Met behulp van de views en de nodige data zal de respons gemaakt worden.

```
<?php

namespace App\Controllers;
use App\Models\Cocktail;

class CocktailController extends BaseController {

    public static function detail ($id) {
        $cocktail = Cocktail::find($id);


        print_r(Ingredient::getByCocktailId($id));
        self::loadView('/cocktail/detail', [
            'cocktail' => $cocktail
        ]);
    }

}
```

## Model

Een model is een voorstelling van een object uit onze database. In veel gevallen zal een tabel dus een bijhorende model hebben. Indien we een lege model class maken en afleiden van de `BaseModel` dan zitten hier reeds basis methods in zoals `getAll`, `find`, `delete`.

Willen we niet deze standaard method dan moeten we een nieuwe method aanmaken in deze nieuw aangemaakte model. Wil je een method aanmaken dat bruikbaar is voor alle models dan kan dit in de `BaseModel`.

```
<?php
namespace App\Models;

class Cocktail extends BaseModel {

}
```

## Views

De view wordt opgeroepen vanuit de Controller of vanuit een andere view. En stelt de html van de pagina voor.

Hierin zit enkel de data, niet de volledige html. Deze zit in de template.

```
<h1><?= $cocktail->name; ?></h1>
<img src="/images/cocktails/<?= $cocktail->photo; ?>">
<p><?= $cocktail->description; ?></p>
```

### Template

De template omvat de volledige html structuur met `<head>` en `<body>`. De variabele `$content` wordt vervangen door de inhoud van de view die werd aangeroepen vanuit de controller.
