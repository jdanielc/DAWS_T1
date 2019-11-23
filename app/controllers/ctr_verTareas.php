<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
require_once DIR_PROYECTO."/models/Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";

if(isset($_GET["borrado"])){
    echo "<script type='text/javascript'>alert('Tarea Elminada');</script>";
}

$result = GetTareas();

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

//Tomo todas la tareas
echo $blade->run("listar_tareas.listar" , ["tareas" => $tareas, "limit" => $limit, "starting_limit" => $starting_limit,
    "total_pages" =>$total_pages, "page" => $page, "total_result" => $total_results]);
