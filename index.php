<?php
$controller = $_GET['controller'] ?? 'inicio';
$action = $_GET['action'] ?? 'index';

// Cargar el controlador solicitado
$controllerFile = "controllers/{$controller}Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $nombreClase = ucfirst($controller) . "Controller";

    if (class_exists($nombreClase)) {
        $controlador = new $nombreClase();

        if (method_exists($controlador, $action)) {
            $controlador->$action();
        } else {
            echo "❌ Acción '$action' no encontrada en $nombreClase.";
        }
    } else {
        echo "❌ Clase '$nombreClase' no encontrada.";
    }
} else {
    echo "❌ Controlador '$controllerFile' no encontrado.";
}

if (!isset($_GET['controller'])) {
    require_once 'views/home.php';
    exit;
}
?>
