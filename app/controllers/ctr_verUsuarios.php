<?php
require_once __DIR__."/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
require_once DIR_PROYECTO."/models/Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_Empleado.php";
include_once DIR_PROYECTO."/controllers/helper/helper.php";

$rol_necesario = 1;
include_once "ctr_acceso.php";

$result = getUsuarios();

$empleados = array();
while ($row = $result->fetch()){
    $empleado = new Empleado($row["id"]);
    array_push($empleados, setProperRol($empleado));
}
include_once DIR_PROYECTO."/controllers/ctr_Paginacion.php";

//Tomo todas la tareas
echo $blade->run("listar_usuarios.listar_usuarios" , ["empleados" => $empleados, "limit" => $limit, "starting_limit" => $starting_limit,
    "total_pages" =>$total_pages, "page" => $page, "total_result" => $total_results]);