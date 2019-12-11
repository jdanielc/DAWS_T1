<?php
/* Clase encargada de gestionar las conexiones a la base de datos */
require_once  DIR_PROYECTO. "/config.php";
class Database
{
    private $dbh;
    private $database = DBNOMBRE;
    private $usename = DBUSUARIO;
    private $password = DBPASSWORD;
    static $_instance;

    private function __construct() {
        try{
            $this->dbh = new PDO("mysql:host=localhost;dbname=$this->database", "$this->usename", "$this->password");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    private function __clone(){}

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function prepare($sql){
        try{
            return $this->dbh->prepare($sql);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    //POR ARREGLAR
    /*public function query($sql) {
        return $this->dbh->exec($sql);
    }*/

    public function getConnection() {
        return $this->dbh;
    }

}
/* EJEMPLO DE USO
 *
    $db = Database::getInstance();

    $stmt = ("SELECT * FROM table_empleado WHERE emp_nombre = (?) AND emp_apellido = (?)");
    $result = $db->prepare($stmt);
    $result->bindParam(1, $nombre, PDO::PARAM_STR);
    $result->bindParam(2, $apellido, PDO::PARAM_STR);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();

 * */
