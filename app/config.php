<?php
//Datos BBDD
define("DBUSUARIO", "root");
define("DBPASSWORD", "");
define("DBNOMBRE", "daw_proyecto_1");
define("DIR_PROYECTO", __DIR__);

include __DIR__ . '\..\lib\BladeOne.php';
use eftec\bladeone\BladeOne;

 $blade= new BladeOne(__DIR__ . '\views\templates',
    __DIR__.'\views\templates\compiled', BladeOne::MODE_DEBUG);
