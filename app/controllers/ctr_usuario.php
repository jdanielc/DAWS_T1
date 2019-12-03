<?php

if(!isset($_SESSION["usuario"])){
    include("ctr_Login.php");
}
$usuario = unserialize($_SESSION["usuario"]);
$rol = $usuario->getRol();

if(!$rol){
    header("ctr_verTareas.php");
}
