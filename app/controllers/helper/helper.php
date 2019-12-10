<?php
/**
 * @return mixed|string
 */
function getCurrentUser()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION["usuario"])){
        $usuario = unserialize($_SESSION["usuario"]);
        $usuario = $usuario->getNombre() . " " . $usuario->getApellido();

        return $usuario;
    }else{
        header("Location: ctr_Login.php");
    }
}