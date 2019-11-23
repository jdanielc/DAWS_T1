<?php
require_once __DIR__."/../config.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";

if(isset($_POST["action"])){
    $datos = $_POST;
    $errores = array();
    $enviar = array();

    list($errores, $enviar) = comprobarDatosBasicos($errores, $enviar);

    if(sizeof($errores) > 0){
        echo $blade->run("CRUD.formulario", ["errores"=>$errores, "action"=>"add", "provincias"=>$provincias, "datos"=>$datos]);
    }else{
        $result = NuevaTarea($enviar);
        if ($result){
            header("Location: ctr_verTareas.php?page=".$total_pages);
        }
    }
}else{
    header("Location: ctr_verTareas.php");
}