<?php
    require_once __DIR__ . '/../classes/Database.php';

    header("Content-Type: application/json");

    $sql = "SELECT codice, denominazione FROM officina";
    $conn = Database::connect();
    $result = $conn->query($sql);

    $officine = [];

    while($row = $result->fetch_assoc()){ // itera sui risultati della query e 
                    // aggiunge ogni riga all'array $officine come un array associativo, 
                    // dove le chiavi sono i nomi delle colonne del database (codice e denominazione) e 
                    // i valori sono i corrispondenti valori di ciascuna riga.
        $officine[] = $row;
    }

    echo json_encode($officine);
?>