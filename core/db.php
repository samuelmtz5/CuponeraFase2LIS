<?php
class Database {
    public static function connect() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "cuponera_db";

        $conn = new mysqli($host, $user, $pass, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>
