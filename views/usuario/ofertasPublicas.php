<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ofertas disponibles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">🎟 Ofertas públicas disponibles</h2>

    <?php if (!empty($ofertas)): ?>
        <div class="row g-4">
            <?php foreach ($ofertas as $oferta): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($oferta['titulo']) ?></h5>
                            <p class="card-text mb-1">
                                <strong>Precio oferta:</strong> $<?= number_format($oferta['precio_oferta'], 2) ?>
                                <br><small class="text-muted">(Antes: $<?= number_format($oferta['precio_regular'], 2) ?>)</small>
                            </p>
                            <p class="card-text">
                                <strong>Descripción:</strong><br><?= nl2br(htmlspecialchars($oferta['descripcion'])) ?>
                            </p>
                            <p class="card-text">
                                <strong>Válido hasta:</strong> <?= $oferta['fecha_fin'] ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="index.php?controller=usuario&action=login" class="btn btn-outline-primary w-100">
                                Iniciar sesión para comprar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center mt-4" role="alert">
            No hay ofertas disponibles por el momento.
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
