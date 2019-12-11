<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";

$rol_necesario = 1;
include_once "ctr_acceso.php";

if (IsPost("usuario") && !IsPost("borrar")){
    $id = ValorPost("usuario");
    $result = getUsuario($id);
    $t = $result->fetch();
    $empleado = new Empleado($t["id"]);
    setProperRol($empleado);
    echo $blade -> run("eliminar.eliminar_usuario", ["empleado" => $empleado]);

}else if (IsPost("borrar")){
    $id = ValorPost("borrar");
    $delete = borrarUsuario($id);
    if($delete){
        $usuario = unserialize($_SESSION["usuario"]);
        if ($id=== $usuario->getId()){
            header("Location: ctr_Login.php");
        }else{
            header("Location: ctr_verUsuarios.php");
        }
    }else{
    //AÑADIR PAGINA ERROR
    }
}