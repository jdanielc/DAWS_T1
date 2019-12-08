<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
require_once DIR_PROYECTO."/models/Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";

$rol_necesario = 0;
include_once "ctr_acceso.php";

if(IsGet("id") && !IsPost("estado")){

    $id = ValorGET("id");
    $result = GetTarea($id);
    $t = $result->fetch();
    $tarea = new Tarea($t["id"]);
    echo $blade->run("completar.completar" , ["tarea" => $tarea, "id"=>$id]);

}else if(isset($_POST["estado"])){

        $estado = $_POST["estado"];

        $tarea = new Tarea($_POST["id"]);
        $id = $tarea->getId();
        $an_ant = "";
        $an_post = "";


        if(IsPost("texto_previo")){
            $an_ant = ValorPost("texto_previo");
        }else{
            $an_ant = $tarea->getAnotacionesAnt();
        }
        if(IsPost("texto_posterior")){
            $an_post = ValorPost("texto_posterior");
        }else{
            $an_post = $tarea->getAnotacionesPost();
        }

        $datos = [$estado, $an_ant, $an_post];
        $result = SaveTarea($id, $datos);

        if($result){
            header("Location: ctr_verTareas.php?page=".$page);
        }

}else{

}