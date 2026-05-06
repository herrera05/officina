<?php
    require_once __DIR__ . '/../classes/Database.php';

    $data = json_decode(file_get_contents("php://input")); // riceve un oggetto JSON con due proprietà: "servizio" (ID del servizio) e "officine" (array di ID officine)
    // protezione contro SQL injection
    $servizio = (int)$data->servizio;
    $officine = $data->officine;

    foreach($officine as $officina){
        $officina = (int)$officina;

        $sql = "INSERT INTO offre (officina, servizio)
                VALUES ($officina, $servizio)";
        $conn->query($sql); // esegue la query per ogni officina, associando il servizio a ciascuna di esse
    }

    echo json_encode(["ok"=>true]); // restituisce una risposta JSON che indica che l'operazione è stata completata con successo
?>