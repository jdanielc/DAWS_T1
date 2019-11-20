<?php
require_once __DIR__."/../config.php";

include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];


    $errores = array();
    $datos = [
        "txtOperario"=>"",
        "txtAdmin"=>"",
        "fecha_creacion"=>"",
        "fecha_realizacion"=>"",
        "txtDireccion"=>"",
        "txtPoblacion"=>"",
        "txtCP"=>"",
        "anotaciones_ant"=>"",
        "anotaciones_pos"=>""
    ];

    if($action == "add"){
        echo $blade ->run("CRUD.formulario", ["action" => $action, "provincias"=>$provincias, "errores"=> $errores, "datos"=>$datos]);
    }else if($action == "mod"){
        $id = $_POST["id"];

        echo $blade ->run("CRUD.formulario", ["action" => $action, "provincias"=>$provincias, "errores"=> $errores, "id"=>$id, "datos"=>$datos]);
    }

}else{
    header("Location: ctr_verTareas.php");
}