<?php
require_once 'core/db.php';

class Empresa {
    private $nombre, $nit, $direccion, $telefono, $correo, $usuario, $contrasena;

    public function setNombre($v) { $this->nombre = $v; }
    public function setNIT($v) { $this->nit = $v; }
    public function setDireccion($v) { $this->direccion = $v; }
    public function setTelefono($v) { $this->telefono = $v; }
    public function setCorreo($v) { $this->correo = $v; }
    public function setUsuario($v) { $this->usuario = $v; }
    public function setContrasena($v) { $this->contrasena = $v; }

    public function guardar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("INSERT INTO empresas (nombre, nit, direccion, telefono, correo, usuario, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $this->nombre, $this->nit, $this->direccion, $this->telefono, $this->correo, $this->usuario, $this->contrasena);
        $stmt->execute();
    }

    public static function obtenerPendientes() {
    $conn = Database::connect();
    $result = $conn->query("SELECT * FROM empresas WHERE estado = 'pendiente'");
    return $result->fetch_all(MYSQLI_ASSOC);
}

    public static function aprobar($id, $comision) {
        $conn = Database::connect();
        $stmt = $conn->prepare("UPDATE empresas SET estado = 'aprobada', porcentaje_comision = ? WHERE id = ?");
        $stmt->bind_param("di", $comision, $id);
        $stmt->execute();
    }

    public static function rechazar($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("UPDATE empresas SET estado = 'rechazada' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function autenticar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT id, nombre, contrasena FROM empresas WHERE usuario = ? AND estado = 'aprobada'");
        $stmt->bind_param("s", $this->usuario);
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $hash);
        if ($stmt->fetch() && password_verify($this->contrasena, $hash)) {
            return ['id' => $id, 'nombre' => $nombre];
        }
        return false;
    }

}
