<?php

require_once __DIR__ . "/../config.php";
require_once DIR_PROYECTO."/models/Tarea.php";
include_once DIR_PROYECTO . "/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";

if (IsPost("action")) {
    $errores = array();
    $enviar = array();

    list($errores, $enviar) = comprobarDatosBasicos($errores, $enviar);

    //Unicos dos campos que son requeridos aparte de los esenciales

    if (!IsPost("fecha_realizacion")) {
        $errores["fecha_realizacion"] = "Introduzca una fecha valida";
    } else {

        $d1 = strtotime(ValorPost("fecha_realizacion"));
        if (isValidDate($d1, false) && $d1 != false) {
            $enviar["fecha_realizacion"] = date("Y-m-d", $d1);
        } else {
            $errores["fecha_realizacion"] = "Introduzca una fecha valida";
        }
    }


    if (!IsPost("anotaciones_pos")) {
        $enviar["anotaciones_pos"] = "";
    } else {
        $enviar["anotaciones_pos"] = ValorPost("anotaciones_pos");
    }

    $id = $_POST["id"];
    if (sizeof($errores) > 0) {

        echo $blade->run("CRUD.formulario", ["errores" => $errores, "action" => "mod", "provincias" => $provincias,"id" => $id, "datos" => $_POST]);
    } else {
        $result = UpdateTarea($id, $enviar);
        if ($result) {

            header("Location: ctr_verTareas.php");
        }
    }

} else {
    header("Location: ctr_verTareas.php");
}