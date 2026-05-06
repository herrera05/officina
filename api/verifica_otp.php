<?php
    require_once __DIR__ . '/../classes/Database.php';

    $data = json_decode(file_get_contents("php://input"));
    // protezione contro SQL injection
    $conn = Database::connect();

    $user = $conn->real_escape_string($data->user); // OTP inserito dall'utente
    // $password = $conn->real_escape_string($data->password); // opzionale, se vuoi verificare anche la password
    $otp = $conn->real_escape_string($data->otp); // OTP inserito dall'utente

    $sql = "SELECT * FROM otp 
            WHERE user='$user' 
            AND codice='$otp' 
            AND scadenza > NOW()";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        // OTP valido --> elimina OTP
        $conn->query("DELETE FROM otp WHERE user='$user'");

        echo json_encode(["success" => true]); // autenticazione riuscita
    } else {
        echo json_encode(["success" => false]); // OTP non valido o scaduto
    }
?>