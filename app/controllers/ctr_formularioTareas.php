<?php
require_once __DIR__."/../config.php";

include_once DIR_PROYECTO."/controllers/ctr_Tareas.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];

    $provincias = ['Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
        'Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
        'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra',
        'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
        'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];

    if($action == "crear"){
        echo $blade ->run("CRUD.formulario", ["action" => $action, "provincias"=>$provincias]);
    }

}else{
    header("Location: ctr_verTareas.php");
}