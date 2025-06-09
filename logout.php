<?php
session_start();
session_unset();
session_destroy();

// Redireccionar según tipo de sesión
if (isset($_GET['tipo']) && $_GET['tipo'] === 'admin') {
    header("Location: index.php?controller=admin&action=login");
} elseif (isset($_GET['tipo']) && $_GET['tipo'] === 'empresa') {
    header("Location: index.php?controller=empresa&action=login");
} else {
    header("Location: index.php?controller=usuario&action=login");
}
exit;
