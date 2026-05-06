<?php
    require_once __DIR__ . '/../classes/Database.php';


    $conn = Database::connect();
    $res = $conn->query("SELECT * FROM Pezzo_Ricambio");

    $data = [];
    while($row = $res->fetch_assoc()) {
         // itera sui risultati della query e aggiunge ogni riga all'array $data come un array associativo, 
         // dove le chiavi sono i nomi delle colonne del database (codice_ricambio, descrizione, prezzo) e 
         // i valori sono i corrispondenti valori di ciascuna riga.
        $data[] = $row;
    }

    echo json_encode($data);
?>