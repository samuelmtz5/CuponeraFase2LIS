<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 mb-4">
    <a class="navbar-brand" href="#">Panel de Administrador</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarAdmin">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=admin&action=empresasPendientes">Aprobar empresas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=admin&action=verReporteCupones">📦 Cupones vendidos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=admin&action=verReporteGanancias">💰 Ganancias por empresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=admin&action=verReporteVentas">🛒 Ventas por empresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="logout.php?tipo=admin">Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Incluir Bootstrap solo una vez en el layout principal -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

