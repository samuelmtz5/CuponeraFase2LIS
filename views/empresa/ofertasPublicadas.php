<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Ofertas Publicadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'views/shared/navbarEmpresa.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">📋 Mis Ofertas Publicadas</h2>

    <?php if (!empty($ofertas)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Título</th>
                        <th>Precio Regular</th>
                        <th>Precio Oferta</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Canje</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ofertas as $oferta): ?>
                        <tr>
                            <td><?= htmlspecialchars($oferta['titulo']) ?></td>
                            <td>$<?= number_format($oferta['precio_regular'], 2) ?></td>
                            <td>$<?= number_format($oferta['precio_oferta'], 2) ?></td>
                            <td><?= $oferta['fecha_inicio'] ?></td>
                            <td><?= $oferta['fecha_fin'] ?></td>
                            <td><?= $oferta['fecha_limite_canje'] ?></td>
                            <td><?= $oferta['cantidad'] !== null ? $oferta['cantidad'] : 'Ilimitado' ?></td>
                            <td><?= ucfirst($oferta['estado']) ?></td>
                            <td class="text-center">
                                <a href="index.php?controller=empresa&action=editarOferta&id=<?= $oferta['id'] ?>" class="btn btn-sm btn-warning mb-1">✏️ Editar</a>
                                <a href="index.php?controller=empresa&action=desactivarOferta&id=<?= $oferta['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas desactivar esta oferta?')">🚫 Desactivar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center" role="alert">
            No has publicado ninguna oferta todavía.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
