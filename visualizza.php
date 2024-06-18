<?php
// Collegati a un nuovo database (verrà creato se non esiste)
$db = new SQLite3('MyDb.db');



// Seleziona dati dalla tabella
$query = 'SELECT * FROM scarpe';
$result = $db->query($query);

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "ID: " . $row['id'] . " - Modello: " . $row['modello'] . "<br>" . 
    " - Marca: " . $row['marca'] . "<br>" . 
    " - Prezzo: " . $row['costo'] . "<br>" . 
    " - Quantità: " . $row['qnt'] . "<br>" . 
    " - Immagine: <img src='" . $row['img'] . "' alt='Immagine del prodotto'><br>";

}

// Chiudi la connessione al database
$db->close();
?>
<style>
    img {
        width: 300px;
    }
    </style>