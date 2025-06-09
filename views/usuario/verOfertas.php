<?php include 'views/shared/navbarUsuario.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ofertas Disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="text-center mb-4">🎁 Ofertas Disponibles</h2>

    <?php if (!empty($ofertas)): ?>
        <div class="row">
        <?php foreach ($ofertas as $oferta): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($oferta['titulo']) ?></h5>
                        <p class="card-text">
                            <strong>Precio Regular:</strong> $<?= number_format($oferta['precio_regular'], 2) ?><br>
                            <strong>Precio Oferta:</strong> $<?= number_format($oferta['precio_oferta'], 2) ?><br>
                            <strong>Descripción:</strong> <?= htmlspecialchars($oferta['descripcion']) ?>
                        </p>
                        <form method="POST" action="index.php?controller=usuario&action=comprarCupon" class="mt-auto">
                            <input type="hidden" name="id_oferta" value="<?= $oferta['id'] ?>">
                            <div class="mb-2">
                                <label class="form-label">Número tarjeta</label>
                                <input type="text" class="form-control" name="numero_tarjeta" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">Fecha vencimiento</label>
                                <input type="date" class="form-control" name="fecha_vencimiento" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">CVV</label>
                                <input type="text" class="form-control" name="cvv" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Comprar Cupón</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No hay ofertas disponibles por el momento.
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

