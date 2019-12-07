<?php
if (file_exists(__DIR__."/../config.php")){
    require_once __DIR__."/../config.php";
}
require_once DIR_PROYECTO."/models/Tarea.php";
require_once DIR_PROYECTO."/models/Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO."/controllers/helper/helper.php";

//Mandamos mensajes para situaciones especiales, tales como borrado de tareas o deniago de acceso
if(isset($_GET["borrado"])){
    echo "<script type='text/javascript'>alert('Tarea Elminada');</script>";
}
if(isset($_GET["denegado"])){
    echo "<script type='text/javascript'>alert('No tiene permiso para realizar esta acción');</script>";
}

$usuario = getCurrentUser();
$result = GetTareas();

$tareas = array();
while ($row = $result->fetch()){
    $tarea = new Tarea($row["id"]);
    array_push($tareas, setAdminAndOp($tarea));
}

include_once DIR_PROYECTO."/controllers/ctr_Paginacion.php";

//Tomo todas la tareas
echo $blade->run("listar_tareas.listar" , ["tareas" => $tareas, "limit" => $limit, "starting_limit" => $starting_limit,
    "total_pages" =>$total_pages, "page" => $page, "total_result" => $total_results, "usuario"=>$usuario]);