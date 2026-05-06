<?php
    require_once "../config/db.php";

    $conn = Database::connect();
    $data = json_decode(file_get_contents("php://input"));

    $officina = (int)$data->officina;
    $pezzo = (int)$data->pezzo;
    $qta = (int)$data->quantita;
    $tipo = $data->tipo;

    // controlla se esiste già
    $sql = "SELECT * FROM presente_ricambio 
            WHERE officina=$officina AND pezzo=$pezzo";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc(); // recupera la riga esistente, che contiene la quantità attuale del pezzo in quella officina
        $nuova_qta = $row['quantita'];

        if($tipo == "aggiungi"){
            $nuova_qta += $qta;
        } else {
            $nuova_qta -= $qta;
            if($nuova_qta < 0) $nuova_qta = 0;
        }

        $conn->query("UPDATE presente_ricambio 
                    SET quantita=$nuova_qta
                    WHERE officina=$officina AND pezzo=$pezzo");

    } else {
        if($tipo == "aggiungi"){
            $conn->query("INSERT INTO presente_ricambio (officina, pezzo, quantita)
                        VALUES ($officina, $pezzo, $qta)");
        }
    }

    echo json_encode(["ok"=>true]);
?>