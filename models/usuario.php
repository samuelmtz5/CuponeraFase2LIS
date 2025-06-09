<?php
require_once 'core/db.php';

class Usuario {
    private $datos = [];
    private $usuario;
    private $contrasena;

    public function setDatos($data) {
        $this->datos = $data;
    }

    public function setUsuario($u) { $this->usuario = $u; }
    public function setContrasena($c) { $this->contrasena = $c; }

    public function guardar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, correo, contrasena, nombre_completo, apellidos, dui, fecha_nacimiento) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss",
            $this->datos['usuario'],
            $this->datos['correo'],
            $this->datos['contrasena'],
            $this->datos['nombre_completo'],
            $this->datos['apellidos'],
            $this->datos['dui'],
            $this->datos['fecha_nacimiento']
        );
        $stmt->execute();
    }

    public function autenticar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT id, contrasena, nombre_completo FROM usuarios WHERE usuario = ? OR correo = ?");
        $stmt->bind_param("ss", $this->usuario, $this->usuario);
        $stmt->execute();
        $stmt->bind_result($id, $hash, $nombre);
        if ($stmt->fetch() && password_verify($this->contrasena, $hash)) {
            return ['id' => $id, 'nombre_completo' => $nombre];
        }
        return false;
    }
}
