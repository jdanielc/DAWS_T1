<?php

require_once DIR_PROYECTO."/models/Database.php";

function GetTareas()
{
    try{
        $db = Database::getInstance();
        $stmt = ("SELECT * FROM table_tarea");
        $result = $db->prepare($stmt);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result;
    }catch (PDOException $exception){
        throw new MyDatabaseException( $exception->getMessage( ) , (int)$exception->getCode( ) );

    }
}

/**
 * Devuelve los datos de una tarea
 * @param type $id
 * @return boolean
 */
function GetTarea($id)
{

    $db = Database::getInstance();
    $stmt = ("SELECT * FROM table_tarea WHERE ID = (?)");
    $result = $db->prepare($stmt);
    $result->bindParam(1 , $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();

    return $result;
}


/**
 * Guarda la tarea
 */
function SaveTarea($id, $datos_tarea)
{
    try {

        $db = Database::getInstance();
        $stmt = ("UPDATE table_tarea SET tsk_estado=(?), 
    tsk_anotaciones_ant = (?), tsk_anotaciones_post = (?) WHERE id=(?)");
        $result = $db->prepare($stmt);
        $result->bindParam(1, $datos_tarea[0], PDO::PARAM_STR);
        $result->bindParam(2, $datos_tarea[1], PDO::PARAM_STR);
        $result->bindParam(3, $datos_tarea[2], PDO::PARAM_STR);
        $result->bindParam(4, $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return true;
    }catch (PDOException $exception){
        throw new MyDatabaseException( $exception->getMessage( ) , (int)$exception->getCode( ) );
    }

}

function UpdateTarea($id, $datos_tarea){

}

/**
 * Guarda una nueva la tarea
 */
function NuevaTarea($datos)
{
    try{
        $db = Database::getInstance();
        $stmt = ("INSERT INTO table_tarea (tsk_operario, tsk_administrativo, tsk_fecha_creacion, tsk_direccion, tsk_poblacion, tsk_provincia, tsk_cp,tsk_estado, tsk_anotaciones_ant) VALUES 
(:operario, :admin, :fecha, :direccion,:poblacion, :provincia, :cp, :estado, :anotacion )");
        $result = $db->prepare($stmt);
        $result->bindParam(":operario", $datos["txtOperario"], PDO::PARAM_INT);
        $result->bindParam(":admin", $datos["txtAdmin"]);
        $result->bindParam(":fecha", $datos["fecha_creacion"]);
        $result->bindParam(":direccion", $datos["txtDireccion"]);
        $result->bindParam(":direccion", $datos["txtDireccion"]);
        $result->bindParam(":poblacion", $datos["txtPoblacion"]);
        $result->bindParam(":provincia", $datos["provincia"]);
        $result->bindParam(":cp", $datos["txtCP"]);
        $result->bindParam(":estado", $datos["estado"]);
        $result->bindParam(":anotacion", $datos["anotaciones_ant"]);
        $result->execute();
        return true;
    }catch (PDOException $exception){
        throw new MyDatabaseException( $exception->getMessage( ) , (int)$exception->getCode( ) );
    }
}

function BorrarTareas($id){
    try{
        $db = Database::getInstance();
        $stmt = ("DELETE FROM table_tarea WHERE id = (?)");
        $result = $db->prepare($stmt);
        $result->bindParam(1 , $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return true;
    }catch (PDOException $Exception){
        throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
    }

}


function ValorPost($nombreCampo, $valorPorDefecto='')
{
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

function VerErrores($campo)
{
    global $errores;
    if (isset($errores[$campo]))
    {
        echo "<p style='color: red'>".$errores[$campo]."</p>";
    }
}