# Artistify
Maak een nieuwe database met de naam artistify en importeer het sql bestand hierin.

Maak de applicatie zo goed mogelijk na. Denk hierbij aan onderstaande features. 

> TIP: **Werk zoveel mogelijk met kleine tussenstappen** en probeer niet alles meteen te doen. 
Bijvoorbeeld bij het tonen van de albums toon je eerst de artist_id. In tweede instantie zal je via een nieuwe method en aangepaste SQL ook de artist zijn naam ophalen en weergeven.

## Navigatie (2pt)
In de zijbalk komen de categorieën uit de tabel genres. Bij het klikken op een categorie worden de albums hierop gefilterd. Zorg dat de active class zich verplaatst naar het item waarop geklikt werd.

Extra: Gebruik ook de slug in de url in plaats van de id.

## Lijst (2pt)
In het lijstscherm zien we de afbeelding, albumnaam, het jaartal en de naam van de artist staan. Link deze naar een detail pagina. De lijst wordt aangepast volgens het aangeklikte genre.

## Detail (2pt)
Toon net zoals op het lijstscherm de details van het album, maar toon ook de tracks van dit album. Bij deze tracks zorg je ervoor dat ze in volgorde van id uit de database worden gehaald maar dat ze in de lijst een volgnummer krijgen van 1 tot x. `x is afhankelijk van het aantal tracks`

## User (1pt)
In de zijbalk zie je de naam van de ingelogde gebruiker staan. Deze komt uit de database.
**Je moet geen login systeem schrijven!** Je mag de $user_id vast zetten in de PHP. Haal daarna de gebruiker op via deze $user_id. Gebruik deze id ook bij de likes

## My favorites (1pt) / like and dislike (1pt)

Zorg ervoor dat de like button werkt en zichzelf aanpast en een dislike wordt.
Toon de favorieten op een nieuwe pagina.

> Tip: Je zal een nieuwe route aanmaken maak je kan wel dezelfde view gebruiken als de homepage.

Veel succes!
