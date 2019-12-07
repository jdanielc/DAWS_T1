<?php
function getCurrentUser()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $usuario = unserialize($_SESSION["usuario"]);
    $usuario = $usuario->getNombre() . " " . $usuario->getApellido();

    return $usuario;
}