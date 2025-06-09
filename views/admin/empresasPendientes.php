<?php include 'views/shared/navbarAdmin.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empresas Pendientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="text-center mb-4">🏢 Empresas pendientes de aprobación</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>Nombre</th>
                    <th>NIT</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empresas as $e): ?>
                <tr>
                    <td><?= htmlspecialchars($e['nombre']) ?></td>
                    <td><?= htmlspecialchars($e['nit']) ?></td>
                    <td><?= htmlspecialchars($e['correo']) ?></td>
                    <td>
                        <form method="POST" class="d-flex flex-column flex-md-row gap-2" action="index.php?controller=admin&action=aprobarEmpresa&id=<?= $e['id'] ?>">
                            <input type="number" step="0.01" name="comision" class="form-control form-control-sm w-100" placeholder="% comisión" required>
                            <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                        </form>
                        <form method="POST" class="mt-2" action="index.php?controller=admin&action=rechazarEmpresa&id=<?= $e['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm w-100">Rechazar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

