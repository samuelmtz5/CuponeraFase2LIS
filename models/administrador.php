<?php
require_once 'core/db.php';

class Administrador {
    private $usuario;
    private $contrasena;

    public function setUsuario($u) { $this->usuario = $u; }
    public function setContrasena($c) { $this->contrasena = $c; }

    public function autenticar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT contrasena FROM administradores WHERE usuario = ?");
        $stmt->bind_param("s", $this->usuario);
        $stmt->execute();
        $stmt->bind_result($hash);
        if ($stmt->fetch()) {
            return md5($this->contrasena) === $hash;
        }
        return false;
    }

    public static function obtenerReporteCupones() {
        $conn = Database::connect();
        $result = $conn->query("SELECT * FROM reporte_cupones_vendidos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerReporteGanancias() {
        $conn = Database::connect();
        $result = $conn->query("SELECT * FROM reporte_ganancias_por_empresa");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerReporteVentas() {
        $conn = Database::connect();
        $result = $conn->query("SELECT * FROM reporte_ventas_por_empresa");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
