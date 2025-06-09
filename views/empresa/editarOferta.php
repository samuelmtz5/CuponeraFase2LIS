<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Oferta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'views/shared/navbarEmpresa.php'; ?>

<div class="container mt-4">
    <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
        <h3 class="text-center mb-4">✏️ Editar Oferta</h3>
        <form method="POST" action="index.php?controller=empresa&action=guardarEdicion&id=<?= $oferta['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Título:</label>
                <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($oferta['titulo']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio regular:</label>
                <input type="number" step="0.01" name="precio_regular" class="form-control" value="<?= $oferta['precio_regular'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio oferta:</label>
                <input type="number" step="0.01" name="precio_oferta" class="form-control" value="<?= $oferta['precio_oferta'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha inicio:</label>
                <input type="date" name="fecha_inicio" class="form-control" value="<?= $oferta['fecha_inicio'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha fin:</label>
                <input type="date" name="fecha_fin" class="form-control" value="<?= $oferta['fecha_fin'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha límite de canje:</label>
                <input type="date" name="fecha_canje" class="form-control" value="<?= $oferta['fecha_limite_canje'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Cantidad (opcional):</label>
                <input type="number" name="cantidad" class="form-control" value="<?= $oferta['cantidad'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <textarea name="descripcion" class="form-control" rows="3" required><?= htmlspecialchars($oferta['descripcion']) ?></textarea>
            </div>
            <div class="mb-4">
                <label class="form-label">Estado:</label>
                <select name="estado" class="form-select">
                    <option value="disponible" <?= $oferta['estado'] === 'disponible' ? 'selected' : '' ?>>Disponible</option>
                    <option value="no disponible" <?= $oferta['estado'] === 'no disponible' ? 'selected' : '' ?>>No disponible</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="index.php?controller=empresa&action=verMisOfertas" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
