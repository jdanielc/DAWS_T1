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
    // No hacemos nada pues no podemos guardar nada en el código
    // Simulamos como si estuviese implementado
}

/**
 * Guarda una nueva la tarea
 */
function NuevaTarea($datos_tarea)
{
    // No hacemos nada pues no podemos guardar nada en el código
    // Simulamos como si estuviese implementado

    // return id;
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