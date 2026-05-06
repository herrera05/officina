<?php
    require_once __DIR__ . '/../classes/Database.php';

    $sql = "SELECT codice_articolo, descrizione FROM accessorio";
    $conn = Database::connect();
    $result = $conn->query($sql);

    $data = []; // inizializza un array vuoto per memorizzare i risultati della query

    while($row = $result->fetch_assoc()){
        $data[] = $row;
    } // itera sui risultati della query e aggiunge ogni riga all'array 
     // $data come un array associativo, dove le chiavi sono i nomi delle colonne del database (codice_articolo e descrizione) 
     // e i valori sono i corrispondenti valori di ciascuna riga.

    echo json_encode($data);
?>