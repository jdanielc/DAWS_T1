<?php
require_once __DIR__ . "/../config.php";
include_once DIR_PROYECTO . "/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO . "/controllers/ctr_compDatos.php";
require_once DIR_PROYECTO . "/models/Tarea.php";
include_once DIR_PROYECTO."/controllers/helper/helper.php";

session_start();

if (IsPost("buscar") || isset($_SESSION["buscar"])) {
    $datosBuscar = "";
    //Tomo los datos de busqueda
    if (IsPost("buscar")) {
        $datosBuscar = ValorPost("buscar");
    } else {
        $datosBuscar = $_SESSION["buscar"];
    }

    //Hago la peticion a la BBDD
    $result = BuscarTareas($datosBuscar);

    $tareas = array();
    while ($row = $result->fetch()) {
        $tarea = new Tarea($row["id"]);
        array_push($tareas, setAdminAndOp($tarea));
    }
    //Añado paginacion
    include_once DIR_PROYECTO . "/controllers/ctr_Paginacion.php";

    $usuario = getCurrentUser();

    $_SESSION["buscar"] = $datosBuscar;

    if ($result) {
        echo $blade->run("listar_tareas.listar", ["tareas" => $tareas, "limit" => $limit, "starting_limit" => $starting_limit,
            "total_pages" => $total_pages, "page" => $page, "total_result" => $total_results,
            "busqueda" => $_SESSION["buscar"], "usuario"=>$usuario]);
    }

} else {
    $_SESSION["buscar"] = null;
    header("Location: ctr_verTareas.php");
}