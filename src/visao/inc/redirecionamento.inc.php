<?php
    session_start();
    if (isset($_COOKIE["logado"])) {
        if ($_COOKIE["logado"] == 'on') {
            $_SESSION["usuario"] = $_COOKIE["usuario"];
        }
    }
    if (!isset($_SESSION["usuario"])) {
        header("Location:../visao/login.php");
        exit;
    }
    $usuario = $_SESSION['usuario'];
