<?php
include_once('../Assets/MySQL/connect.control.mysql.php');
// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
//limpiamos la variables de la secion
session_unset();
//destruimos la sesion
session_destroy();
//redirect page to index.php
header('location: ../index.php');

?>