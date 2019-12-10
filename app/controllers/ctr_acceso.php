<?php
session_start();

if (!isset($_SESSION)){
    header("Location: ctr_Login.php");
} else if(!isset($_SESSION["usuario"])){
    header("Location: ctr_Login.php");
}else{
    $usuario = unserialize($_SESSION["usuario"]);
    $rol = $usuario->getRol();
    if ($rol_necesario != $rol || $rol_necesario != null){
        header("Location: ctr_verTareas.php?denegado=1");
    }else if ($rol_necesario === null){
        header("Location: ctr_Login.php");
    }
}

