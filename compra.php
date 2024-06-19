<?php
$db = new SQLite3('MyDb.db');



// Seleziona dati dalla tabella
$query = 'SELECT * FROM scarpe';
$result = $db->query($query);
$totale = 0;
$listaModelli = [];
$listaPezzi = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    
    $modello = $_POST[$row['modello']];
    $pezzi = $_POST[$row['id']];
    

    if ($pezzi > 0) {
        
        array_push($listaModelli,$row['modello']);
    array_push($listaPezzi,$pezzi);
    $somma += $row['costo'] * $pezzi;


}
    


}


echo("<h2>Riepilogo dell'ordine: </h2>");
echo("<br>");
$lunghezza = count($listaModelli);
for ($i = 0; $i < $lunghezza; $i++) {
    echo "Ordine: ". ($i +1) .  " " . $listaModelli[$i] . "<br>";
    echo "In " . $listaPezzi[$i] . " pezzi" . "<br>";
}

echo("<h3> Il totale da pagare è: </h3>");
echo("<h3>" . $somma . " euro </h3>");

?>