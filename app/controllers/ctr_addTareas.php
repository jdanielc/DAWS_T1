<?php
require_once __DIR__."/../config.php";
include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";
include_once DIR_PROYECTO."/controllers/ctr_paginacion.php";

if(isset($_POST["action"])){
    $datos = $_POST;
    $errores = array();
    $enviar = array();

    if(!isset($datos["txtOperario"]) || !is_numeric($datos["txtOperario"])){
        $errores["txtOperario"] = "Introduzca un operario";
    }else{
        $enviar["txtOperario"] = $datos["txtOperario"];
    }


    if(!isset($datos["txtAdmin"]) || !is_numeric($datos["txtAdmin"])){
        $errores["txtAdmin"] = "Introduzca un administrador";
    }else{
        $enviar["txtAdmin"] = $datos["txtAdmin"];
    }


    if(!isset($datos["fecha_creacion"])){
        $errores["fecha_creacion"] = "Introduzca una fecha valida";
    }else{
        $f1 = $datos["fecha_creacion"];
        $d1 = date( "Y-m-d", strtotime( $f1 ));
        if(time() < $d1){
            $errores["fecha_creacion"] = "Introduzca una fecha valida";
        }else{
            $enviar["fecha_creacion"] = $d1;
        }
    }

    if(!isset($datos["txtDireccion"])){
        $errores["txtDireccion"] = "Introduzca una direccion";
    }else{
        $enviar["txtDireccion"] = $datos["txtDireccion"];
    }

    if(!isset($datos["provincia"])){
        $errores["provincia"] = "Introduzca una provincia";
    }else{
        $enviar["provincia"] = $datos["provincia"];
    }
    if(!isset($datos["txtCP"]) || strlen($datos["txtCP"]) != 5){
        $errores["txtCP"] = "Introduzca un codigo postal";
    }else{
        $enviar["txtCP"] = $datos["txtCP"];
    }

    if(!isset($datos["txtPoblacion"])){
        $errores["txtPoblacion"] = "Introduzca una población";
    }else{
        $enviar["txtPoblacion"] = $datos["txtPoblacion"];
    }

    if(!isset($datos["estado"])){
        $errores["estado"] = "";
    }else{
        $enviar["estado"] = $datos["estado"];
    }

    if(!isset($datos["anotaciones_ant"])){
        $enviar["anotaciones_ant"] = "";
    }else{
        $enviar["anotaciones_ant"] = $datos["anotaciones_ant"];
    }

    if(sizeof($errores) > 0){
        echo $blade->run("CRUD.formulario", ["errores"=>$errores, "action"=>"add", "provincias"=>$provincias, "datos"=>$datos]);
    }else{
        $result = NuevaTarea($enviar);
        if ($result){

            header("Location: ctr_verTareas.php?page=".$total_pages);
        }
    }

}else{
    header("Location: ctr_verTareas.php");
}
//TODO: REVISAR AÑADIR Y EMPEZAR CON MODIFICAR