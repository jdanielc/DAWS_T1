<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";



//Tomo todas la tareas
$result = GetTareas();

$tareas = array();
while ($row = $result->fetch()){
    $tarea = new Tarea($row["id"]);
    array_push($tareas, $tarea);
}

// Datos necesarios para la paginación
$limit = 2;
$total_results = count($tareas);
$total_pages = intval(ceil($total_results/$limit));

$page = 1;
if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}

$starting_limit = ($page-1)*$limit;
