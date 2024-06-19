<?php
session_start();

$db = new SQLite3('MyDb.db');



// Seleziona dati dalla tabella
$query = 'SELECT * FROM scarpe';
$result = $db->query($query);
$totale = 0;
$listaModelli = [];
$listaPezzi = [];
$listaUrl = [];

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    
    $modello = $_POST[$row['modello']];
    $pezzi = $_POST[$row['id']];
    

    if ($pezzi > 0) {
        
        array_push($listaModelli,$row['modello']);
    array_push($listaPezzi,$pezzi);
    array_push($listaUrl,$row['img']);
    $somma += $row['costo'] * $pezzi;


}

    


}


echo("<h2>Riepilogo dell'ordine: </h2>");
echo("<br>");
$lunghezza = count($listaModelli);
for ($i = 0; $i < $lunghezza; $i++) {
    echo "Ordine: ". ($i +1) .  " " . $listaModelli[$i] . "<br>";
    echo "In " . $listaPezzi[$i] . " pezzi" . "<br>";
    echo '<br><img src="' . $listaUrl[$i] . '" alt="Immagine del modello">';
    echo("<hr>");
}
$_SESSION["listaM"] = $listaModelli;
$_SESSION["listaP"] = $listaPezzi;
$_SESSION["listaU"] = $listaUrl;
$_SESSION["somma"] = $somma;


echo("<h3> Il totale da pagare è: </h3>");
echo("<h3>" . $somma . " euro </h3>");
echo("<br>");
echo("<br>");

echo("<form action='conferma.php' method = 'post' >");
echo("<h3> Per confermare il tuo ordine inserisci la tua mail: </h3>");

echo("<input type= 'text' name = 'mail'>");
echo("<br>");
echo("<br>");
echo("<input type = 'submit' value = 'conferma'>");
echo("</form>");

?>

<style>
img {
    width: 300px;
    height: 300px;
}
</style>