<?php
session_start();
require_once __DIR__."/../config.php";
include_once DIR_PROYECTO."/controllers/ctr_Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";
require_once DIR_PROYECTO."/models/Empleado.php";

$errores = array();
if(IsPost("usuario")){
    $iscorrect = false;
    $isName = false;
    $isPass = false;

    $datos = array(
        "usuario"=>null,
        "password"=>null
    );
    $errores = array();
    $usser = 0;
    $result = getUsuarios();

    $usuarios = array();
    while ($row = $result->fetch()){
        $usuario = new Empleado($row["id"]);
        array_push($usuarios, $usuario);
    }

    $username = ValorPost("usuario");
    $userpass= ValorPost("password");

    foreach($usuarios as $usuario){
        if ($usuario->getNombre() === $username && $usuario->getPassword() === $userpass){
            $iscorrect = true;
            $usser = $usuario;
            break;
        }else{
            if ($usuario->getNombre() != $username && !$isName){
                $errores["usuario"] = "Nombre Incorrecto";
                $datos["usuario"] = $username;

            }else{
                $isName = true;
            }

            if($usuario->getPassword() != $userpass && !$isPass){
                $errores["password"] = "Contraseña Incorrecta";
                $datos["password"] = $userpass;
            }else{
                $isPass = true;
            }
            $iscorrect = false;
        }
    }

    if ($iscorrect){
        $_SESSION["usuario"] = serialize($usser);
        header("Location: ctr_verTareas.php");
    }else{
        echo $blade->run("login.login", ["errores"=>$errores, "datos"=>$datos]);
    }

}else{
    $errores["usuario"] = "Introduzca un usuario";
    $errores["password"] = "Introduzca una contraseña";
    $datos = array(
        "usuario"=>null,
        "password"=>null
    );

    echo $blade->run("login.login", ["errores"=>$errores, "datos"=>$datos]);
}