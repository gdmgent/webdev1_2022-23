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
$sql = 'SELECT * FROM flights WHERE date > NOW()';
$statement = $db->prepare($sql);
```

Let hierbij op met SQL Injection. Indien we gegevens opvragen via de `$_GET` of `$_POST` of `$_COOKIE`. Dan moeten we eerst placeholders toevoegen aan onze SQL query. Om die bij de volgende stap (execute) toe te voegen.

```
//SQL om 1 specifieke vlucht op te halen
$sql = 'SELECT * FROM flights WHERE flight_id = :p_flight_id';
$statement = $db->prepare($sql);
```

## 3. Execute

In deze stap zal de SQL Query uiteindelijk uitgevoerd worden door de MySQL Server. Geef indien nodig dus ook de parameters mee.

```
//SQL 
```