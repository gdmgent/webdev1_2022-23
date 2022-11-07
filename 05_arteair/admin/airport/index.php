<?php

//Airport controller
//alle airports gaat printen... 
//maak gebruik van Model en views
include '../../includes/db.php';
include '../../model/BaseModel.php';
include '../../model/Airport.php';

$airports = Airport::getAll();

print_r($airports);
?>
<h1>Airport admin page</h1>

<div class="grid">
    <div class="item">
        <div>CODE</div>
        <div>NAME</div>
        <div>CITY, COUNTRY</div>
        <div>
            <a href="/admin/airport/edit.php?id=ID">edit</a>
            <a href="/admin/airport/delete.php?id=ID">delete</a>
        </div>
       
    </div>
</div>