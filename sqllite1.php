<?php
try {
    // Collegati a un nuovo database (verrà creato se non esiste)
    $db = new SQLite3('MyDb.db');

    // Crea una tabella
    $query = 'CREATE TABLE IF NOT EXISTS scarpe(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        modello TEXT NOT NULL,
        marca TEXT NOT NULL,
        img TEXT NOT NULL,
        costo NUMBER NOT NULL,
        qnt NUMBER NOT NULL
    )';
    $db->exec($query);

    // Query per verificare l'esistenza della tabella dipendenti
    $query = "SELECT name FROM sqlite_master WHERE type='table' AND name='scarpe';";
    $result = $db->query($query);

    // Controlla il risultato
    if ($result->fetchArray()) {
        echo "La tabella 'scarpe' esiste.";
    } else {
        echo "La tabella 'scarpe' non esiste.";
    }
    
} catch (Exception $e) {
    echo "Errore: " . $e->getMessage();
} finally {
    // Chiudi la connessione al database
    $db->close();
}
?>
