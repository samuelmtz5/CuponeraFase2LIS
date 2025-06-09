<?php include 'views/shared/navbarUsuario.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">📘 Mis Cupones Comprados</h2>

    <?php if (!empty($historial)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Oferta</th>
                        <th>Código Cupón</th>
                        <th>Fecha de Compra</th>
                        <th>Monto Pagado</th>
                        <th>Factura Emitida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $compra): ?>
                        <tr>
                            <td><?= htmlspecialchars($compra['titulo']) ?></td>
                            <td><?= $compra['codigo_cupon'] ?></td>
                            <td><?= $compra['fecha_compra'] ?></td>
                            <td>$<?= number_format($compra['monto'], 2) ?></td>
                            <td><?= $compra['fecha_emision'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            No has realizado ninguna compra todavía.
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
