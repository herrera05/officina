<?php
    require_once "Database.php";

    class Officina {

        public static function getAll() {
            $conn = Database::connect();
            $result = $conn->query("SELECT * FROM Officina");

            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
    }
?>