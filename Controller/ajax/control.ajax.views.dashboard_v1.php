<?php
if (!isset($error) && isset($_GET['action'])) {
    # code...
    switch ($_GET['action']) {
                            
    case 'active':
    echo "<p class='bg-danger-default'>Su cuenta ya está activa, ahora puede iniciar sesión.</p>";
    break;

    case 'sendEmail' :
    echo "<p class='bg-danger-default'>Por favor revise su bandeja de entrada para un enlace de restablecimiento.</p>";
    break;

    case 'reset' :
    echo '<p class="bg-danger-default"> Your time expire. Try again please.!</p>';
    break;

    case 'resetAccount':
    echo "<p class='bg-danger-default'>Contraseña cambiada, ahora puede iniciar sesión.</p>";
    break;
    }
} 
?>