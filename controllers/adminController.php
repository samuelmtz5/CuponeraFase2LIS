<?php
require_once 'models/administrador.php';
require_once 'models/empresa.php';

class AdminController {
    public function login() {
        require 'views/admin/login.php';
    }

    public function validarLogin() {
        $admin = new Administrador();
        $admin->setUsuario($_POST['usuario']);
        $admin->setContrasena($_POST['contrasena']);

        if ($admin->autenticar()) {
            session_start();
            $_SESSION['admin'] = true;
            header("Location: index.php?controller=admin&action=empresasPendientes");
        } else {
            echo "<p>Usuario o contraseña incorrectos.</p>";
        }
    }

    public function empresasPendientes() {
        session_start();
        if (!isset($_SESSION['admin'])) { die("Acceso denegado"); }

        $empresas = Empresa::obtenerPendientes();
        require 'views/admin/empresasPendientes.php';
    }

    public function aprobarEmpresa() {
        session_start();
        if (!isset($_SESSION['admin'])) { die("Acceso denegado"); }

        $id = $_GET['id'];
        $comision = $_POST['comision'];
        Empresa::aprobar($id, $comision);

        header("Location: index.php?controller=admin&action=empresasPendientes");
    }

    public function rechazarEmpresa() {
        session_start();
        if (!isset($_SESSION['admin'])) { die("Acceso denegado"); }

        $id = $_GET['id'];
        Empresa::rechazar($id);

        header("Location: index.php?controller=admin&action=empresasPendientes");
    }

    public function verReporteCupones() {
        require_once 'models/Administrador.php';
        $datos = Administrador::obtenerReporteCupones();
        require 'views/admin/reporteCupones.php';
    }

    public function verReporteGanancias() {
        require_once 'models/Administrador.php';
        $datos = Administrador::obtenerReporteGanancias();
        require 'views/admin/reporteGanancias.php';
    }

    public function verReporteVentas() {
        require_once 'models/Administrador.php';
        $datos = Administrador::obtenerReporteVentas();
        require 'views/admin/reporteVentas.php';
    }

}
