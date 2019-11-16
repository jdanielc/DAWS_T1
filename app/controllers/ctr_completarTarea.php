<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
require_once DIR_PROYECTO."/models/Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";

if(isset($_POST["id"]) && !isset($_POST["estado"])){

    $id = $_POST["id"];
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

        if(isset($_POST["texto_previo"])){
            $an_ant = $_POST["texto_previo"];
        }else{
            $an_ant = $tarea->getAnotacionesAnt();
        }
        if(isset($_POST["texto_posterior"])){
            $an_post = $_POST["texto_posterior"];
        }else{
            $an_post = $tarea->getAnotacionesPost();
        }

        $datos = [$estado, $an_ant, $an_post];
        $result = SaveTarea($id, $datos);

        if($result){
            header("Location: ctr_verTareas.php");
        }

}