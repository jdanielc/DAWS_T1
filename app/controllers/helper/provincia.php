<?php
session_start();
$sel = $_SESSION["provincia"];

$enlace = mysqli_connect("localhost", "root", "", "daw_proyecto_1");
$sql = "SELECT * FROM provincias";
$resultado = $enlace->query($sql);

$emp = $resultado->fetch_assoc();

$tabla = "";

while ($row = $resultado->fetch_assoc()){
    if ($sel === $row["provincia"]){
        $tabla .= "<option value='".utf8_encode($row["provincia"])."' selected='selected'>".utf8_encode($row["provincia"])."</option>";

    }else{
        $tabla .= "<option value='".utf8_encode($row["provincia"])."'>".utf8_encode($row["provincia"])."</option>";

    }
}
echo $tabla;
