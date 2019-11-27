<?php

session_start();

$provincia = $_SESSION["provincia"];
$municipio = $_SESSION["municipios"];

$enlace = mysqli_connect("localhost", "root", "", "daw_proyecto_1");
if ($provincia === "" && !isset($_POST["municipio"])){
    $provincia = "Albacete";
}else if (isset($_POST["municipio"])){
    $provincia = $_POST["municipio"];
}
$sql = "SELECT municipio FROM municipios INNER JOIN provincias ON provincias.id = municipios.provincia WHERE provincias.provincia = '$provincia'";

$resultado = $enlace->query($sql);
$tabla = "";
while ($row = $resultado->fetch_assoc()){
    if($municipio === $row["municipio"]){
        $tabla .= "<option value='{$row["municipio"]}' selected='selected'>".utf8_encode($row["municipio"])."</option>";
    }else{
        $tabla .= "<option value='{$row["municipio"]}'>".utf8_encode($row["municipio"])."</option>";

    }
}
utf8_encode($tabla);
echo $tabla;