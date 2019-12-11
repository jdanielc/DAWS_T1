<?php

class Tarea{
    private $id;
    private $operario;
    private $administrativo;
    private $fecha_creacion;
    private $fecha_realizacion;
    private $direccion;
    private $poblacion;
    private $provincia;
    private $cp;
    private $estado;
    private $anotaciones_ant;
    private $anotaciones_post;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOperario()
    {

        return $this->operario;
    }

    /**
     * @param mixed $operario
     */
    public function setOperario($operario)
    {
        $this->operario = $operario;
    }

    /**
     * @return mixed
     */
    public function getAdministrativo()
    {

        return $this->administrativo;
    }

    /**
     * @param mixed $administrativo
     */
    public function setAdministrativo($administrativo)
    {
        $this->administrativo = $administrativo;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    /**
     * @return mixed
     */
    public function getFechaRealizacion()
    {
        return $this->fecha_realizacion;
    }

    /**
     * @param mixed $fecha_realizacion
     */
    public function setFechaRealizacion($fecha_realizacion)
    {
        $this->fecha_realizacion = $fecha_realizacion;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getPoblacion()
    {
        return $this->poblacion;
    }

    /**
     * @param mixed $poblacion
     */
    public function setPoblacion($poblacion)
    {
        $this->poblacion = $poblacion;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getAnotacionesAnt()
    {
        return $this->anotaciones_ant;
    }

    /**
     * @param mixed $anotaciones_ant
     */
    public function setAnotacionesAnt($anotaciones_ant)
    {
        $this->anotaciones_ant = $anotaciones_ant;
    }

    /**
     * @return mixed
     */
    public function getAnotacionesPost()
    {
        return $this->anotaciones_post;
    }

    /**
     * @param mixed $anotaciones_post
     */
    public function setAnotacionesPost($anotaciones_post)
    {
        $this->anotaciones_post = $anotaciones_post;
    }


    public function __construct($id1 = null)
    {
        if ($id1 != null){
            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT * FROM table_tarea WHERE id = (?)");

            $stmt->bindParam(1, $id1, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $row = $stmt->fetch();
            //Asigno valores
            $this->id = $row["id"];
            $this->operario = $row["tsk_operario"];
            $this->administrativo = $row["tsk_administrativo"];
            $this->fecha_creacion = $row["tsk_fecha_creacion"];
            $this->fecha_realizacion = $row["tsk_fecha_realizacion"];
            $this->direccion = $row["tsk_direccion"];
            $this->poblacion = $row["tsk_poblacion"];
            $this->provincia = $row["tsk_provincia"];
            $this->cp = $row["tsk_cp"];
            $this->estado = $row["tsk_estado"];
            $this->anotaciones_ant = $row["tsk_anotaciones_ant"];
            $this->anotaciones_post = $row["tsk_anotaciones_post"];
        }
    }

    /**
     * @return PDO
     */

}
