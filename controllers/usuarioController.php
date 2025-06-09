<?php
require_once 'models/usuario.php';

class UsuarioController {
    public function registro() {
        require 'views/usuario/registro.php';
    }

    public function guardarRegistro() {
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $mayorEdad = date('Y-m-d', strtotime('-18 years'));

        if ($fechaNacimiento > $mayorEdad) {
            die("Debes tener al menos 18 años para registrarte.");
        }

        $usuario = new Usuario();
        $usuario->setDatos([
            'usuario' => $_POST['usuario'],
            'correo' => $_POST['correo'],
            'contrasena' => password_hash($_POST['contrasena'], PASSWORD_BCRYPT),
            'nombre_completo' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'dui' => $_POST['dui'],
            'fecha_nacimiento' => $_POST['fecha_nacimiento']
        ]);

        $usuario->guardar();

        echo "<p>Registro exitoso. <a href='index.php?controller=usuario&action=login'>Inicia sesión</a>.</p>";
    }

    public function login() {
        require 'views/usuario/login.php';
    }

    public function validarLogin() {
        $usuario = new Usuario();
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);

        $datos = $usuario->autenticar();

        if ($datos) {
            session_start();
            $_SESSION['usuario_id'] = $datos['id'];
            $_SESSION['usuario_nombre'] = $datos['nombre_completo'];
            header("Location: index.php?controller=usuario&action=verOfertas");exit;
        } else {
            echo "<p>Credenciales incorrectas.</p>";
        }
    }

    public function verOfertas() {
        session_start();
        if (!isset($_SESSION['usuario_id'])) { die("Acceso no autorizado"); }

        require_once 'models/Oferta.php';
        $ofertas = Oferta::obtenerDisponibles();

        require 'views/usuario/verOfertas.php';
    }

    public function comprarCupon() {
        session_start();
        if (!isset($_SESSION['usuario_id'])) {
            echo "<script>alert('Debe iniciar sesión para comprar.'); window.location.href = 'index.php?controller=usuario&action=login';</script>";
            exit;
        }

        require_once 'models/Compra.php';

        $idUsuario = $_SESSION['usuario_id'];
        $idOferta = $_POST['id_oferta'];
        $fechaVencimiento = $_POST['fecha_vencimiento'];

        $hoy = new DateTime();
        $vencimiento = new DateTime($fechaVencimiento);

        // Validación de tarjeta vencida
        if ($vencimiento < $hoy) {
            echo "<script>alert('❌ La tarjeta está vencida.'); window.location.href = 'index.php?controller=usuario&action=verOfertas';</script>";
            exit;
        }

        // Validación de máximo 5 cupones
        if (Compra::cuponesPorOferta($idUsuario, $idOferta) >= 5) {
            echo "<script>alert('⚠️ Solo puedes comprar hasta 5 cupones por oferta.'); window.location.href = 'index.php?controller=usuario&action=verOfertas';</script>";
            exit;
        }

        $codigo = strtoupper(bin2hex(random_bytes(5)));

        Compra::guardar([
            'id_usuario' => $idUsuario,
            'id_oferta' => $idOferta,
            'codigo' => $codigo
        ]);

        echo "<script>alert('✅ Compra exitosa. Tu código de cupón es: $codigo'); window.location.href = 'index.php?controller=usuario&action=verOfertas';</script>";
        exit;
    }

    
    public function historial() {
        session_start();
        if (!isset($_SESSION['usuario_id'])) { die("Acceso no autorizado."); }

        require_once 'models/Compra.php';
        $historial = Compra::obtenerHistorial($_SESSION['usuario_id']);

        require 'views/usuario/historial.php';
    }

    public function verOfertasPublicas() {
        require_once 'models/oferta.php';
        $ofertas = Oferta::obtenerDisponibles();
        require 'views/usuario/ofertasPublicas.php';
    }

}
