<?php
session_start();
if(!isset($_SESSION['dentro']) || ! $_SESSION['dentro'])  // Si no existe la sesión…
{
    //MOSTRAMOS a la página de login con el tipo de error ‘fuera’: que indica que
    // se trató de acceder directamente a una página sin loguearse previamente
    header('Location: ctr_Login.php');
    // No hay nada más que hacer
    exit;
}
