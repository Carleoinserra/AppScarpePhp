<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>

<?php
// Collegati a un nuovo database (verrà creato se non esiste)
$db = new SQLite3('MyDb.db');



// Seleziona dati dalla tabella
$query = 'SELECT * FROM scarpe';
$result = $db->query($query);
echo("<form action ='compra.php' method = 'post'>");
echo ("<div class='card-group'>");


while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo ("<div class='card'>");
    echo("<img class='card-img-top' src='" . $row['img'] . "' alt='Card image cap'>");
    echo("<div class='card-body'>");
    echo("<h5 class='card-title'>". $row['modello'] . "</h5>");
    echo("<p class='card-text'>". "- Marca: " . $row['marca'] . "<br>" . 
    " - Prezzo: " . $row['costo'] . "<br>" . 
    " - Quantità: " . $row['qnt'] . "<br>" . 
     "Modello: " . $row['modello'] . "<br>");
     echo("</div>"); 
     echo("<input type='checkbox' id='vehicle1' name='" . $row['modello'] . "' value='" . $row['modello'] . "'>");
     echo("<input type = 'number' value = '0' name = '" . $row['id'] . "'> ");
     echo("</div>");
    
    

}


echo("</div>");
echo("<input type='submit' value = 'acquista'>");
echo("</form>");

// Chiudi la connessione al database
$db->close();
?>
<style>
    img {
        width: 300px !important;
        height: 300px !important;
    }
    </style>



