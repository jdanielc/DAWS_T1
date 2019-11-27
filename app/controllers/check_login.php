<?php
require_once DIR_PROYECTO."/models/Empleado.php";
if(!isset($_SESSION['usuario']) || ! $_SESSION['usuario'])  // Si no existe la sesión…
{
    $usuario = unserialize($_SESSION["usuario"]);

    if($usuario->getNombre() != ""){
        exit;
    }else{
        header('Location: ctr_Login.php');
    }
    //MOSTRAMOS a la página de login con el tipo de error ‘fuera’: que indica que
    // se trató de acceder directamente a una página sin loguearse previamente
    header('Location: ctrLogin.php');
    // No hay nada más que hacer
    exit;
}