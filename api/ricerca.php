<?php
    require_once __DIR__ . '/../classes/Ricerca.php';

    $servizio = $_GET['servizio'] ?? null;
    $ricambio = $_GET['ricambio'] ?? null;
    $accessorio = $_GET['accessorio'] ?? null;

    $result = Ricerca::trovaOfficine($servizio, $ricambio, $accessorio); // chiama il metodo statico trovaOfficine della classe Ricerca, 
                                                                        //passando i parametri ottenuti dalla query string.

    header('Content-Type: application/json');
    echo json_encode($result);
?>