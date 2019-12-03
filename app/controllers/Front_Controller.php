<?php
if (file_exists(__DIR__."/../config.php")){
    require_once __DIR__."/../config.php";
}else{
    require_once APP_PATH."config.php";

}
include_once DIR_PROYECTO."/controllers/ctr_compDatos.php";

define("ACTION", "a");

if (IsGet(ACTION) && file_exists(ValorGET(ACTION))) {

include ValorGET(ACTION);
//TODO: Por tu puta madre daniel termina esto en condiciones
} else {
    header("ctr_verTareas.php");
}