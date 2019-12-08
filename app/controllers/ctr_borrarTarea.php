<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";

//Compruebo que el usuario sea el indicado
$rol_necesario = 1;
include_once "ctr_acceso.php";

if(isset($_POST["id"]) && !isset($_POST["delete"])){
    $id = $_POST["id"];
    $result = GetTarea($id);
    $t = $result->fetch();
    $tarea = new Tarea($t["id"]);

    echo $blade->run("borrar.borrar" , ["tarea" => $tarea, "id"=>$id]);

}else if(isset($_POST["delete"])){
    $decision = $_POST["delete"];
    $id=$_POST["id"];
    if(in_array("delete", $decision) && !in_array("cancel", $decision)){
        $delete = BorrarTareas($id);
        if($delete){
            header("Location: ctr_verTareas.php?borrado=si");
        }
    }else if(!in_array("delete", $decision) && in_array("cancel", $decision)){
        header("Location: ctr_verTareas.php");
    }
}