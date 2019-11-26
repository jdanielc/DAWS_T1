<?php
require_once DIR_PROYECTO."/models/Database.php";

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