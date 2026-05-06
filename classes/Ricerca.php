<?php
    require_once "Database.php";

    class Ricerca {

        public static function trovaOfficine($servizio, $ricambio, $accessorio) {
            $conn = Database::connect();
            $query = "
            SELECT DISTINCT o.*
            FROM Officina o
            LEFT JOIN Offre ofr ON o.codice = ofr.officina
            LEFT JOIN Presente_Ricambio pr ON o.codice = pr.officina
            LEFT JOIN Presente_Accessorio pa ON o.codice = pa.officina
            WHERE 1=1
            ";

            if ($servizio) {
                $query .= " AND ofr.servizio = " . intval($servizio);
            }

            if ($ricambio) {
                $query .= " AND pr.pezzo = " . intval($ricambio);
            }

            if ($accessorio) {
                $query .= " AND pa.accessorio = " . intval($accessorio);
            }

            $result = $conn->query($query);

            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
    }
?>