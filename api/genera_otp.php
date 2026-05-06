<?php
    require_once __DIR__ . '/../classes/Database.php';

    $data = json_decode(file_get_contents("php://input"));

    $user = $conn->real_escape_string($data->user);
    $password = $conn->real_escape_string($data->password);

    // genera OTP
    $otp = rand(100000, 999999);

    // scadenza (5 minuti)
    $scadenza = date("Y-m-d H:i:s", strtotime("+5 minutes")); // scadenza tra 5 minuti
    // protezione contro SQL injection

    // salva OTP
    $conn->query("DELETE FROM otp WHERE user='$user'"); // elimina eventuali OTP precedenti per lo stesso utente

    $conn->query("INSERT INTO otp (user, codice, scadenza)
                VALUES ('$user', '$otp', '$scadenza')");

    // salva temporaneamente utente (opzionale)
    $conn->query("DELETE FROM dipendente WHERE user='$user'");
    $conn->query("INSERT INTO dipendente (user, password)
                VALUES ('$user', '$password')");

    echo json_encode(["otp" => $otp]); // simulazione
?>