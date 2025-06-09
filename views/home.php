<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Cuponera SV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container text-center mt-5">
        <h1 class="display-4 mb-4">🎟️ Bienvenido a <strong>La Cuponera SV</strong></h1>
        <h2 class="mb-5">¿Qué deseas hacer?</h2>

        <div class="row justify-content-center">
            <!-- Usuarios -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="my-1">Usuarios (Clientes)</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="index.php?controller=usuario&action=verOfertasPublicas" class="btn btn-outline-primary w-100 mb-2">Ver ofertas</a></li>
                            <li><a href="index.php?controller=usuario&action=login" class="btn btn-outline-success w-100 mb-2">Iniciar sesión</a></li>
                            <li><a href="index.php?controller=usuario&action=registro" class="btn btn-outline-info w-100">Registrarse</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Empresas -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="my-1">Empresas</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="index.php?controller=empresa&action=login" class="btn btn-outline-warning w-100 mb-2">Iniciar sesión</a></li>
                            <li><a href="index.php?controller=empresa&action=registro" class="btn btn-outline-dark w-100">Registrarse</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Administrador -->
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header bg-danger text-white">
                        <h4 class="my-1">Administrador</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="index.php?controller=admin&action=login" class="btn btn-outline-danger w-100">Iniciar sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-5 text-muted">
            <p>&copy; <?= date('Y') ?> La Cuponera SV</p>
        </footer>
    </div>

</body>
</html>

