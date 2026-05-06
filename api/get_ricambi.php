<?php
    require_once "../classes/Database.php";

    header("Content-Type: application/json");
    // Questo script recupera i pezzi di ricambio dal database e li restituisce in formato JSON.
    $sql = "SELECT codice_pezzo, descrizione FROM pezzo_ricambio";
    // Connessione al database e esecuzione della query
    $conn = Database::connect();
    // Se la query fallisce, restituisce un messaggio di errore in formato JSON e termina l'esecuzione dello script.
    $result = $conn->query($sql);

    if(!$result){
        echo json_encode(["errore" => $conn->error]); // restituisce un messaggio di errore in formato JSON se la query fallisce
        exit;
    }

    $data = [];

    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    echo json_encode($data);
?>