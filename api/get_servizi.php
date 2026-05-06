<?php
    require_once __DIR__ . '/../classes/Database.php';

    $sql = "SELECT codice, descrizione FROM servizio";
    $conn = Database::connect();
    $result = $conn->query($sql);

    $data = [];

    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    echo json_encode($data);
?>