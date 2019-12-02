<?php

class User_Control{
    static private $instance=NULL;

    protected $defaultController='';
    protected $defaultAction='';

    private function __construct($defaultController, $defaultAction='index') {
        $this->defaultController=$defaultController;
        $this->defaultAction=$defaultAction;
    }

    public static function getInstance($defaultController, $defaultAction='Index')
    {
        self::$instance=new self($defaultController, $defaultAction);
        return self::$instance;
    }

    public function Run(){

        if(!isset($_SESSION["usuario"])){
            header("Location: ctr_Login.php");
        }
        $usuario = unserialize($_SESSION["usuario"]);
        $rol = $usuario->getRol();

        if(!$rol){
            header("Location: ctr_verTareas.php");
        }
    }
}