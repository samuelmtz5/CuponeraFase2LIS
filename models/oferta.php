<?php
require_once 'core/db.php';

class Oferta {
    public static function obtenerDisponibles() {
        $conn = Database::connect();
        $sql = "SELECT * FROM ofertas WHERE estado = 'disponible'";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function guardar($data) {
        $conn = Database::connect();
        $stmt = $conn->prepare("INSERT INTO ofertas 
            (id_empresa, titulo, precio_regular, precio_oferta, fecha_inicio, fecha_fin, fecha_limite_canje, cantidad, descripcion, estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isddssssss",
            $data['id_empresa'],
            $data['titulo'],
            $data['precio_regular'],
            $data['precio_oferta'],
            $data['fecha_inicio'],
            $data['fecha_fin'],
            $data['fecha_canje'],
            $data['cantidad'],
            $data['descripcion'],
            $data['estado']
        );
        $stmt->execute();
    }

    public static function obtenerPorEmpresa($empresa_id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM ofertas WHERE id_empresa = ?");
        $stmt->bind_param("i", $empresa_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM ofertas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function actualizar($id, $data) {
        $conn = Database::connect();
        $stmt = $conn->prepare("UPDATE ofertas SET titulo=?, precio_regular=?, precio_oferta=?, fecha_inicio=?, fecha_fin=?, fecha_limite_canje=?, cantidad=?, descripcion=?, estado=? WHERE id=?");
        $stmt->bind_param("sddssssssi",
            $data['titulo'],
            $data['precio_regular'],
            $data['precio_oferta'],
            $data['fecha_inicio'],
            $data['fecha_fin'],
            $data['fecha_canje'],
            $data['cantidad'],
            $data['descripcion'],
            $data['estado'],
            $id
        );
        $stmt->execute();
    }

    public static function desactivar($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("UPDATE ofertas SET estado='no disponible' WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }


}
