<?php
    require_once __DIR__ . '/../configs/config.php';

    class Database {
        public static function connect() {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($conn->connect_error) {
                die("Errore connessione: " . $conn->connect_error);
            }

            return $conn;
            //questo richiama il database e se c'è un errore di connessione, 
            // mostra un messaggio di errore e termina l'esecuzione dello script. Altrimenti, restituisce la connessione al database. 
        }
    }
?>