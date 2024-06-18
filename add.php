<?php
$modello = $_POST["modello"];
$marca = $_POST["marca"];
$img = $_POST["img"];
$costo = $_POST["costo"];
$qnt = $_POST["qnt"];

$db = new SQLite3('MyDb.db');
// Inserisci dati nella tabella usando prepared statements
$stmt = $db->prepare('INSERT INTO scarpe (modello, marca, img, costo, qnt) VALUES (:modello, :marca,:img,:costo, :qnt   )');
$stmt->bindValue(':modello', $modello, SQLITE3_TEXT);
    $stmt->bindValue(':marca', $marca, SQLITE3_TEXT);
    $stmt->bindValue(':img', $img, SQLITE3_TEXT);
    $stmt->bindValue(':costo', $costo, SQLITE3_TEXT);
    $stmt->bindValue(':qnt', $qnt, SQLITE3_TEXT);
 // Esegui la query e controlla il risultato
 if ($stmt->execute()) {
    echo "Nuova scarpa inserita con successo.";
} else {
    echo "Errore nell'inserimento della scarpa: " . $db->lastErrorMsg();
}   



?>