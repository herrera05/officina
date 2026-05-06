<?php
    require_once __DIR__ . '/../classes/Database.php';

    $data = json_decode(file_get_contents("php://input"));

    $accessorio = (int)$data->accessorio;
    $officine = $data->officine;

    foreach($officine as $officina){ // $officina è un ID, quindi lo castiamo a intero per sicurezza
        $officina = (int)$officina;

        $sql = "INSERT INTO presente_accessorio (officina, accessorio, quantita)
                VALUES ($officina, $accessorio, 1)";
        $conn->query($sql);
    }

    echo json_encode(["ok"=>true]);
?>