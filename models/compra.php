<?php
require_once 'core/db.php';

class Compra {
    public static function cuponesPorOferta($usuario, $oferta) {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT COUNT(*) FROM compras WHERE id_usuario = ? AND id_oferta = ?");
        $stmt->bind_param("ii", $usuario, $oferta);
        $stmt->execute();
        $stmt->bind_result($total);
        $stmt->fetch();
        return $total;
    }

    public static function guardar($data) {
        $conn = Database::connect();
        $stmt = $conn->prepare("INSERT INTO compras (id_usuario, id_oferta, codigo_cupon) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $data['id_usuario'], $data['id_oferta'], $data['codigo']);
        $stmt->execute();

        // También genera factura
        $sqlPrecio = $conn->prepare("SELECT precio_oferta FROM ofertas WHERE id = ?");
        $sqlPrecio->bind_param("i", $data['id_oferta']);
        $sqlPrecio->execute();
        $sqlPrecio->bind_result($precio);
        $sqlPrecio->fetch();

        $stmtFactura = $conn->prepare("INSERT INTO facturas (id_compra, monto) VALUES (?, ?)");
        $id_compra = $conn->insert_id;
        $stmtFactura->bind_param("id", $id_compra, $precio);
        $stmtFactura->execute();
    }

    public static function obtenerHistorial($usuario_id) {
        $conn = Database::connect();
        $sql = "
            SELECT 
                o.titulo,
                c.codigo_cupon,
                c.fecha_compra,
                f.monto,
                f.fecha_emision
            FROM compras c
            INNER JOIN ofertas o ON o.id = c.id_oferta
            LEFT JOIN facturas f ON f.id_compra = c.id
            WHERE c.id_usuario = ?
            ORDER BY c.fecha_compra DESC
        ";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
