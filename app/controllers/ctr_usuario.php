<?php
session_start();

if(!isset($_SESSION["usuario"])){
    header("Location: ctr_Login.php");
}else{
    $usuario = unserialize($_SESSION["usuario"]);
    $rol = $usuario->getRol();
    if ($rol_necesario != $rol){
        header("Location: ctr_verTareas.php?denegado=1");

    }
}

