<?php include 'views/shared/navbarAdmin.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ganancias por Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white text-center">
            <h4 class="my-1">💰 Ganancias por Empresa</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Empresa</th>
                            <th>Porcentaje Comisión</th>
                            <th>Total Ganancias ($)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $fila): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['empresa']) ?></td>
                            <td class="text-center"><?= $fila['porcentaje_comision'] ?>%</td>
                            <td class="text-end">$<?= number_format($fila['total_ganancias'], 2) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($datos)): ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted">No hay datos disponibles.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
