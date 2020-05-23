<?php
    $index = "http://" . $_SERVER['HTTP_HOST'];

    if (!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION['usuario'])) {
        echo "<script>window.location='".$index."';</script>";
        die;
    } else {
        $idUsuario = $_SESSION['usuario'];
        session_destroy();
        session_start();
        $_SESSION['usuario'] = $idUsuario;
    }
?>