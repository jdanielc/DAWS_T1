<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
require_once DIR_PROYECTO."/controllers/ctr_compDatos.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";

$rol_necesario = 1;

include_once "ctr_acceso.php";

if(IsGet("action")){
    $action = ValorGET("action");

        $id = ValorGET("id");


    $errores = array();
    $datos = [
        "txtOperario"=>"",
        "txtAdmin"=>"",
        "fecha_creacion"=>"",
        "fecha_realizacion"=>"",
        "txtDireccion"=>"",
        "provincia"=>"",
        "txtPoblacion"=>"",
        "estado"=>"",
        "txtCP"=>"",
        "anotaciones_ant"=>"",
        "anotaciones_pos"=>""
    ];

    if($action == "add"){
        echo $blade ->run("CRUD.formulario", ["action" => $action, "errores"=> $errores,
            "id"=>$id, "datos"=>$datos, ]);
    }else if($action == "mod"){
        $result = GetTarea($id);
        $t = $result->fetch();
        $tarea = new Tarea($t["id"]);

        $datos = [
            "txtOperario"=>$tarea->getOperario(),
            "txtAdmin"=>$tarea->getAdministrativo(),
            "fecha_creacion"=>$tarea->getFechaCreacion(),
            "fecha_realizacion"=>$tarea->getFechaRealizacion(),
            "txtDireccion"=>$tarea->getDireccion(),
            "txtPoblacion"=>$tarea->getPoblacion(),
            "provincia"=>$tarea->getProvincia(),
            "estado"=>$tarea->getEstado(),
            "txtCP"=>$tarea->getCp(),
            "anotaciones_ant"=>$tarea->getAnotacionesAnt(),
            "anotaciones_pos"=>$tarea->getAnotacionesPost()
        ];

        echo $blade ->run("CRUD.formulario", ["action" => $action, "errores"=> $errores, "id"=>$id, "datos"=>$datos]);
    }

}else{
    header("Location: ctr_verTareas.php");
}