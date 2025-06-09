<?php
require_once 'models/empresa.php';

class EmpresaController {
    public function registrar() {
        require 'views/empresa/registro.php';
    }

    public function guardar() {
        $empresa = new Empresa();
        $empresa->setNombre($_POST['nombre']);
        $empresa->setNIT($_POST['nit']);
        $empresa->setDireccion($_POST['direccion']);
        $empresa->setTelefono($_POST['telefono']);
        $empresa->setCorreo($_POST['correo']);
        $empresa->setUsuario($_POST['usuario']);
        $empresa->setContrasena(password_hash($_POST['contrasena'], PASSWORD_BCRYPT));
        $empresa->guardar();

        require 'views/empresa/exito.php';
    }

    public function login() {
        require 'views/empresa/login.php';
    }

    public function validarLogin() {
        require_once 'models/Empresa.php';

        $empresa = new Empresa();
        $empresa->setUsuario($_POST['usuario']);
        $empresa->setContrasena($_POST['contrasena']);

        $datos = $empresa->autenticar();

        if ($datos) {
            session_start();
            $_SESSION['empresa_id'] = $datos['id'];
            $_SESSION['empresa_nombre'] = $datos['nombre'];
            header("Location: index.php?controller=empresa&action=publicarOferta");
        } else {
            header("Location: index.php?controller=empresa&action=login&error=1");exit;

        }
    }

    public function publicarOferta() {
    session_start();
    if (!isset($_SESSION['empresa_id'])) { die("Acceso denegado"); }

    require 'views/empresa/publicarOferta.php';
}

    public function guardarOferta() {
        session_start();
        if (!isset($_SESSION['empresa_id'])) { die("Acceso denegado"); }

        require_once 'models/oferta.php';
        Oferta::guardar([
            'id_empresa' => $_SESSION['empresa_id'],
            'titulo' => $_POST['titulo'],
            'precio_regular' => $_POST['precio_regular'],
            'precio_oferta' => $_POST['precio_oferta'],
            'fecha_inicio' => $_POST['fecha_inicio'],
            'fecha_fin' => $_POST['fecha_fin'],
            'fecha_canje' => $_POST['fecha_canje'],
            'cantidad' => $_POST['cantidad'] ?: null,
            'descripcion' => $_POST['descripcion'],
            'estado' => $_POST['estado']
        ]);

        header("Location: index.php?controller=empresa&action=publicarOferta&success=1");exit;

    }

    public function verMisOfertas() {
        session_start();
        if (!isset($_SESSION['empresa_id'])) { die("Acceso denegado"); }

        require_once 'models/oferta.php';
        $ofertas = Oferta::obtenerPorEmpresa($_SESSION['empresa_id']);

        require 'views/empresa/ofertasPublicadas.php';
    }

    public function editarOferta() {
        session_start();
        if (!isset($_SESSION['empresa_id'])) { die("Acceso denegado"); }

        require_once 'models/Oferta.php';
        $id = $_GET['id'];
        $oferta = Oferta::obtenerPorId($id);

        require 'views/empresa/editarOferta.php';
    }

    public function guardarEdicion() {
        session_start();
        if (!isset($_SESSION['empresa_id'])) { die("Acceso denegado"); }

        require_once 'models/oferta.php';
        $id = $_GET['id'];
        Oferta::actualizar($id, [
            'titulo' => $_POST['titulo'],
            'precio_regular' => $_POST['precio_regular'],
            'precio_oferta' => $_POST['precio_oferta'],
            'fecha_inicio' => $_POST['fecha_inicio'],
            'fecha_fin' => $_POST['fecha_fin'],
            'fecha_canje' => $_POST['fecha_canje'],
            'cantidad' => $_POST['cantidad'] ?: null,
            'descripcion' => $_POST['descripcion'],
            'estado' => $_POST['estado']
        ]);

        header("Location: index.php?controller=empresa&action=verMisOfertas");
    }

    public function desactivarOferta() {
        session_start();
        if (!isset($_SESSION['empresa_id'])) { die("Acceso denegado"); }

        require_once 'models/Oferta.php';
        $id = $_GET['id'];
        Oferta::desactivar($id);

        header("Location: index.php?controller=empresa&action=verMisOfertas");
    }

    public function registro() {
        require 'views/empresa/registro.php';
    }


}
