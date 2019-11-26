<?php

class Empleado{
    private $id;
    private $nombre;
    private $apellido;
    private $tlf;
    private $email;
    private $rol;
    private $password;

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getTlf()
    {
        return $this->tlf;
    }

    /**
     * @param mixed $tlf
     */
    public function setTlf($tlf)
    {
        $this->tlf = $tlf;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function __construct($id1 = null)
    {
        if($id1 != null) {
            try {


                $db = Database::getInstance();
                $stmt = $db->prepare("SELECT * FROM table_empleado WHERE id = (?)");

                $stmt->bindParam(1, $id1, PDO::PARAM_INT);

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $row = $stmt->fetch();
                //Asigno valores
                $this->id = $row["id"];
                $this->nombre = $row["emp_nombre"];
                $this->apellido = $row["emp_apellido"];
                $this->tlf = $row["emp_tlf"];
                $this->email = $row["emp_email"];
                $this->rol = $row["emp_rol"];
                $this->password = $row["password"];
            }catch (Exception $exception){

            }
        }
        //https://www.php.net/manual/es/language.types.object.php
    }
}

