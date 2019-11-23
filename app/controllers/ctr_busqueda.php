<?php
require_once __DIR__."/../config.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";
require_once DIR_PROYECTO."/models/Tarea.php";

session_start();
if(IsPost("buscar") || isset($_SESSION["buscar"])){
        $datosBuscar = "";
        if (IsPost("buscar")){
            $datosBuscar = ValorPost("buscar");
        }else{
            $datosBuscar = $_SESSION["buscar"];
        }

        $result= BuscarTareas($datosBuscar);

        $tareas = array();
        while ($row = $result->fetch()){
            $tarea = new Tarea($row["id"]);
            array_push($tareas, $tarea);
        }

        $total_results = count($tareas);
        $limit = 4;
        $total_pages = intval(ceil($total_results/$limit));

        $page = 1;
        if (!isset($_GET['page'])) {
            $page = 1;
        } else{
            $page = $_GET['page'];
        }

        $starting_limit = ($page-1)*$limit;
        $_SESSION["buscar"] = $datosBuscar;

        if ($result){
            echo $blade->run("listar_tareas.listar" , ["tareas" => $tareas, "limit" => $limit, "starting_limit" => $starting_limit,
                "total_pages" =>$total_pages, "page" => $page, "total_result" => $total_results, "busqueda" => $_SESSION["buscar"]]);
        }

}else{
    $_SESSION["buscar"] = null;
    header("Location: ctr_verTareas.php");
}