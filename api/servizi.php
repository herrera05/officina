<?php
    require_once __DIR__ . '/../classes/Database.php';

    $conn = Database::connect();
    $res = $conn->query("SELECT * FROM Servizio");

    $data = [];
    while($row = $res->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    $data = json_decode(file_get_contents("php://input"));

    if($_SERVER['REQUEST_METHOD'] === 'POST'){ // verifica se la richiesta HTTP è di tipo POST, 
                                              // indicando che si sta tentando di inserire un nuovo servizio.
        $query = "INSERT INTO servizi (nome, officina_id) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->execute([$data->nome, $data->officina_id]);

        echo json_encode(["message" => "Servizio inserito"]);
    }
?>