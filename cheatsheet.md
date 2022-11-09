# WebDev 1 cheatsheet

We zullen PHP heel vaak gebruiken in combinatie met MySQL (database server) en dus ook SQL (taal die je spreek met een SQL server).

Bedoeling van een Server Side programmeer taal is om HTML te genereren op de server die dan teruggestuurd wordt naar de Client.

Een client zal dus een request doen naar een specifieke pagina. In de meest eenvoudige opzet is dit rechtstreeks een PHP bestand opvragen. bv `/index.php`.

Op deze pagina's zal je steeds eenzelfde flow hanteren.

1. Connecteren met DB
2. SQL voorbereiden (prepare)
3. Het statement uitvoeren (execute)
4. Data ophalen (fetch)
5. HTML opbouwen (bv via een loop indien er meerdere records zijn)

## 1. Connecteren met DB

```
<?php

CONST DB_DSN = 'mysql:dbname=arteair;host=127.0.0.1;port=3306';
CONST DB_USER = 'root';
CONST DB_PWD = 'secret';

//open DB
$db = new PDO(DB_DSN, DB_USER, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
```

Deze code kan je ook in een globale file plaatsen zodanig dat je die code niet telkens moet kopiëren. Als je die code in `includes/db.php` plaatst dan kan je die aanroepen via `include "includes/db.php";`.

## 2. SQL prepare

We willen nu in de meeste gevallen gegevens opvragen uit de database. Hiervoor zullen we een select query schrijven.

```
//SQL om alle toekomstige vluchten op te halen
$sql = 'SELECT * FROM flight WHERE date > NOW()';
$statement = $db->prepare($sql);
```

Let hierbij op met SQL Injection. Indien we gegevens opvragen via de `$_GET` of `$_POST` of `$_COOKIE`. Dan moeten we eerst placeholders toevoegen aan onze SQL query. Om die bij de volgende stap (execute) toe te voegen.

```
//SQL om 1 specifieke vlucht op te halen
$sql = 'SELECT * FROM flight WHERE flight_id = :p_flight_id';
$statement = $db->prepare($sql);
```

## 3. Execute

In deze stap zal de SQL Query uiteindelijk uitgevoerd worden door de MySQL Server. Geef indien nodig dus ook de parameters mee.

```
//Indien je een sql met parameters hebt aangemaakt dan moet je deze meegeven in je execute functie als array deze parameter kan bijvoorbeeld uit de querystring gehaald worden indien dit is meegegeven.

$flight_id = $_GET['flight_id'];

$success = $statement->execute([
    ':p_flight_id' => $flight_id
]);
```

## 4. Fetch

Na het uitvoeren van de query moeten we bij de select queries ook nog eens de gegeven ophalen (fetchen). Dit kan op meerdere manieren:

| methode | omschrijving | voorbeeld |
| ------- | ------------ | --------- |
| fetchAll | Alle records ophalen van een statement. Dit zal steeds resulteren in een array van array's. | `$flights = $statement->fetchAll();` |
| fetch | Haalt de eerste rij op van het resultaat. Hierdoor heb je een enkelvoudige array. Dit is dus aan te raden bij een query waarbij je 1 record ophaalt. | `$flight = $statement->fetch();` |
| fetchObject | Een variant van de fetch. Dus wordt ook het eerste record opgehaald. Maar hier wordt geen array maar een object van het type `stdClass` (of standaard class) teruggestuurd als resultaat. | `$flight = $statement->fetchObject();` |
| fetchColumn | Haalt de eerste kolom op van het eerste record. Dit kan handig zijn als je een sql hebt waarbij er slechts 1 rij en 1 kolom is. Bijvoorbeeld een count van het aantal vluchten `SELECT COUNT(flight_id) FROM flight;`. | `$number_of_flights = $statement->fetchColumn();` | 

## 5. HTML opbouwen

Met dit resultaat moet je dan je HTML opbouwen op de server. Deze zal dan teruggestuurd worden naar de client.

### fetchAll => Loop

Heb je een `fetchAll` dan zal je ook een loop nodig hebben. De meest eenvoudige manier is een foreach.

```
foreach($flights as $flight) {
    echo '<p>Vertrek: ' . $flight['from'] . '</p>';
}
```

### fetch / fetchOject

Gebruik je 1 record dat je wens voor te stellen dan kan je dit meteen in de HTML printen. 

```
//Bij gebruik van fetch
<h1><?= $flight['from'] ?> -> <?= $flight['to'] ?></h1>

//Bij gebruik van fetchObject
<h1><?= $flight->from ?> -> <?= $flight->to ?></h1>
```

> Tip: De voorkeur gaat uit naar de fetchObject. Want later als we gebruik zullen maken van een framework, zoals Laravel, dan zal dit steeds een object zijn.**

### fetchColumn

Bij een fetchColumn kan je het resultaat rechtsreeks printen in de HTML.

```
<p>Er zijn <?= $number_of_flights; ?> aanwezig in de database.</p>
```