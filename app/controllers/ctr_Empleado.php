<?php
require_once DIR_PROYECTO."/models/Database.php";
/**
 * @return bool|PDOStatement
 * @throws Exception
 */
function getUsuarios(){
    try{
        $db = Database::getInstance();
        $stmt = ("SELECT * FROM table_empleado");
        $result = $db->prepare($stmt);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result;

    }catch (PDOException $exception){
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );

    }
}

/**
 * @param $id
 * @return bool|PDOStatement
 * @throws Exception
 */
function getUsuario($id){
    try{
        $db = Database::getInstance();
        $stmt = ("SELECT * FROM table_empleado WHERE id = :id");
        $result = $db->prepare($stmt);
        $result->bindParam(":id", $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result;

    }catch (PDOException $exception){
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );

    }
}

/**
 * @param $id
 * @return bool|PDOStatement
 * @throws Exception
 */
function borrarUsuario($id){
    try{
        $db = Database::getInstance();
        $stmt = ("DELETE FROM table_empleado WHERE id = :id");
        $result = $db->prepare($stmt);
        $result->bindParam(":id", $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result;

    }catch (PDOException $exception){
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );

    }
}

/**
 * @param $empleado
 * @return mixed
 */
function setProperRol($empleado){
    $rol = $empleado->getRol();
    if ($rol === "0"){
        $empleado->setRol("Operario");
    }else if ($rol === "1"){
        $empleado->setRol("Administrador");
    }

    return $empleado;
}