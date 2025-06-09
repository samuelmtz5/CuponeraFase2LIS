<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicar Oferta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'views/shared/navbarEmpresa.php'; ?>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">📝 Publicar nueva oferta</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?controller=empresa&action=guardarOferta">
                <div class="mb-3">
                    <label class="form-label">Título:</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Precio regular:</label>
                        <input type="number" step="0.01" name="precio_regular" class="form-control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Precio oferta:</label>
                        <input type="number" step="0.01" name="precio_oferta" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Fecha inicio:</label>
                        <input type="date" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Fecha fin:</label>
                        <input type="date" name="fecha_fin" class="form-control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Fecha límite de canje:</label>
                        <input type="date" name="fecha_canje" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad (opcional):</label>
                    <input type="number" name="cantidad" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <textarea name="descripcion" rows="4" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <select name="estado" class="form-select">
                        <option value="disponible">Disponible</option>
                        <option value="no disponible">No disponible</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">✅ Publicar</button>
                </div>
            </form>
        </div>
    </div>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        ✅ ¡Oferta publicada con éxito!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    <script>
        setTimeout(() => location.href = "index.php?controller=empresa&action=publicarOferta", 2500);
    </script>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
