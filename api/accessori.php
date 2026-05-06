<?php
    require_once __DIR__ . '/../classes/Database.php';
    
    $conn = Database::connect();
    $res = $conn->query("SELECT * FROM Accessorio");

    $data = [];
    while($row = $res->fetch_assoc()) {
        $data[] = $row;
    }
    // Questo codice si connette al database, esegue una query per selezionare tutti i record dalla tabella "Accessorio", e poi itera sui risultati per costruire un array associativo. Infine, converte l'array in formato JSON e lo restituisce come risposta.

    echo json_encode($data);
    // La funzione json_encode() viene utilizzata per convertire l'array PHP in una stringa JSON, 
    // che è un formato di dati leggero e facilmente leggibile. 
    // Questa stringa JSON viene poi inviata al client che ha effettuato la richiesta, permettendo di utilizzare i dati in modo efficiente.
?>