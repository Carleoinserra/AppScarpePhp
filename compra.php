<?php
$db = new SQLite3('MyDb.db');



// Seleziona dati dalla tabella
$query = 'SELECT * FROM scarpe';
$result = $db->query($query);

$listaModelli = [];
$listaPezzi = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

    $modello = $_POST[$row['modello']];
    $pezzi = $_POST[$row['id']];
    if ($modello != null) {
    array_push($listaModelli,$modello);}

    if ($pezzi > 0) {
    array_push($listaPezzi,$pezzi); }
    


}

var_dump($listaModelli);
var_dump($listaPezzi);



?>