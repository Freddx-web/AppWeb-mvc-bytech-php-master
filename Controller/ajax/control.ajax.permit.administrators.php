<?php
include_once('../../../Assets/MySQL/connect.control.pages.mysql.php');

$sql = 'SELECT * FROM users';
$sentencia = $db->prepare($sql);
$sentencia->execute();

$resultado = $sentencia->fetchAll();

// Items per page
$articulos_x_pagina = 11;

// Count articles from our database
$total_articulos_db = $sentencia->rowCount();
$paginas = $total_articulos_db/11;
$paginas = ceil($paginas);
    
    // Re:
    if (!$_GET) {
        header('Location:acess.administrators.php?pagina=1');
    }


    if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
        header('Location:acess.administrators.php?pagina=1');
    }

    // Query
    $iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;

    $sql_articulos = 'SELECT * FROM users LIMIT :inicar,:narticulos';
    $sentencia_articulos = $db->prepare($sql_articulos);
    $sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
    $sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
    $sentencia_articulos->execute();

    $resultado_articulos = $sentencia_articulos->fetchAll();


?>