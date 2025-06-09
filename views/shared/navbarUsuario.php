<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar Bootstrap Usuario -->
<nav class="navbar navbar-expand-lg navbar-light bg-light px-4 mb-3 border-bottom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            Usuario: <?= htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Invitado') ?>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUsuario" aria-controls="navbarUsuario" aria-expanded="false" aria-label="Toggle navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarUsuario">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=usuario&action=verOfertas">🎟️ Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=usuario&action=historial">🧾 Mis Cupones</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-danger" href="logout.php">🚪 Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap solo una vez -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
