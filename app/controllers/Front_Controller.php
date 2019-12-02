<?php
require_once APP_PATH."config.php";
include_once DIR_PROYECTO."/controllers/ctr_Empleado.php";
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";
require_once DIR_PROYECTO."/models/Empleado.php";
/**
 * Description of Front_Controller
 */
class Front_Controller {

    const CTRL='c';
    const ACTION='a';
    const PAGE = 'page';
    private $blade;

    static private $instance=NULL; 
    
    protected $defaultController='';
    protected $defaultAction='';
    
    /**
     * Inicializamos controlador frontal indicando cual es el controlador
     * que arranca
     * @param type $defaultController
     * @param type $defaultAction
     */
    private function __construct($defaultController, $defaultAction='index') {
        $this->defaultController=$defaultController;
        $this->defaultAction=$defaultAction;
    }
    
    /**
     * Patrón Singleton
     * 
     * @param type $defaultController
     * @param type $defaultAction
     */
    public static function getInstance($defaultController, $defaultAction='Index')
    {
        self::$instance=new self($defaultController, $defaultAction);
        return self::$instance;
    }
    
    /**
     * Selecciona la acción a realizar
     */
    public function Run()
    {
        // Cuerpo del controlador frontal
        $ctrlName = isset($_GET[self::CTRL]) ? $_GET[self::CTRL] : $this->defaultController;
        $accName = isset($_GET[self::ACTION]) ? $_GET[self::ACTION] : $this->defaultAction;

        // Nombre del fichero a incluir
        $ctrl_file=CTR_PATH.$ctrlName.'.php';
        if (file_exists($ctrl_file))
        {
            include($ctrl_file);

            $ctrl=new $ctrlName();
            $ctrl->{$accName}();
        }
        else
        {
            // Error 404
            $this->Error404('<p>No existe el fichero :$ctrl_file</p>');
        }
    }
    /**
     * Página de error
     * @param type $msg
     */
    public function Error404($msg)
    {
        // Error 404
        echo $blade-> run("error.error", ["msg"=>$msg]);
    }

    /**
     * 
     * @param type $ctrl
     * @param type $action
     * @param type $parameters
     * @return string
     */
    static public function MakeURL($ctrl, $action='', $parameters='')
    {
        if ($action=='')
        {
            $action=self::$instance->defaultAction;
        }
        $url="?".self::CTRL."=$ctrl&".self::ACTION."=$action";
        if ($parameters)
        {
            $url.="&".$parameters;
        }
        return $url;
    }
}
