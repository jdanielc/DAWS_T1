<?php

require_once DIR_PROYECTO."/models/Database.php";
require_once DIR_PROYECTO."/models/Empleado.php";
/**
 * @return bool|PDOStatement
 * @throws Exception
 */
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
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );

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
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );
    }

}

/**
 * @param $id
 * @param $datos
 * @return bool
 * @throws Exception
 */
function UpdateTarea($id, $datos){
    try {

        $db = Database::getInstance();
        $stmt = ("UPDATE table_tarea SET tsk_operario = :operario, tsk_administrativo = :admin,  tsk_fecha_creacion= :fecha_creacion,
        tsk_fecha_realizacion= :fecha_pos,  tsk_direccion = :direccion,  tsk_poblacion = :poblacion ,  tsk_provincia = :provincia,
    tsk_cp= :cp ,  tsk_estado = :estado,  tsk_anotaciones_ant = :anotaciones_ant ,  tsk_anotaciones_post = :anotaciones_pos 
      WHERE id=:id");
        $result = $db->prepare($stmt);
        $result->bindParam(":operario", $datos["txtOperario"], PDO::PARAM_INT);
        $result->bindParam(":admin", $datos["txtAdmin"], PDO::PARAM_INT);
        $result->bindParam(":fecha_creacion", $datos["fecha_creacion"]);
        $result->bindParam(":fecha_pos", $datos["fecha_realizacion"]);
        $result->bindParam(":direccion", $datos["txtDireccion"]);
        $result->bindParam(":poblacion", $datos["txtPoblacion"]);
        $result->bindParam(":provincia", $datos["provincia"]);
        $result->bindParam(":cp", $datos["txtCP"]);
        $result->bindParam(":estado", $datos["estado"]);
        $result->bindParam(":anotaciones_ant", $datos["anotaciones_ant"]);
        $result->bindParam(":anotaciones_pos", $datos["anotaciones_pos"]);
        $result->bindParam(":id", $id);
        $result->execute();

        if($result){
            return true;
        }else{
            return false;
        }

    }catch (PDOException $exception){
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );
    }
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
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );
    }
}

/**
 * @param $id
 * @return bool
 * @throws Exception
 */
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
        throw new Exception( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
    }

}

/**
 * @param $dato
 * @return bool|PDOStatement
 * @throws Exception
 */
function BuscarTareas($dato){

    try{
        $db = Database::getInstance();
        $stmt = ("SELECT * FROM `table_tarea` WHERE (`tsk_operario` LIKE :dato) OR
                                  (`tsk_administrativo` LIKE :dato) OR (`tsk_fecha_creacion`LIKE :dato) OR 
                                  (`tsk_fecha_realizacion` LIKE :dato) OR (`tsk_direccion` LIKE :dato) OR 
                                  (`tsk_poblacion` LIKE :dato) OR (`tsk_provincia` LIKE :dato) OR (`tsk_cp` LIKE :dato) OR 
                                  (`tsk_estado` LIKE :dato) OR (`tsk_anotaciones_ant` LIKE :dato) OR 
                                  (`tsk_anotaciones_post` LIKE :dato)");
        $result = $db->prepare($stmt);
        $dato = "%".$dato."%";
        $result->bindParam(":dato", $dato);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result;
    }catch (PDOException $exception){
        throw new Exception( $exception->getMessage( ) , (int)$exception->getCode( ) );

    }
}

/**
 * @param $tarea
 * @return mixed
 */

function dataExist($id){
    $db = Database::getInstance();
    $stmt = ("SELECT * FROM table_empleado WHERE ID = (?)");
    $result = $db->prepare($stmt);
    $result->bindParam(1 , $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();

    $row = $result->fetch();
    if ($row){
        return true;
    }else{
        return false;
    }

}

function setAdminAndOp($tarea){
    $operario = $tarea -> getOperario();
    $administrador = $tarea-> getAdministrativo();

    $empleado = new Empleado($operario);
    $tarea->setOperario($empleado->getNombre());

    $empleado = new Empleado($administrador);
    $tarea->setAdministrativo($empleado->getNombre());

    return $tarea;
}

