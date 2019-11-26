<?php

$provincia = $_POST["provincia"];

$enlace = mysqli_connect("localhost", "root", "", "daw_proyecto_1");



$sql = "SELECT municipio FROM municipios INNER JOIN provincias ON provincias.id = municipios.provincia WHERE provincias.provincia = '$provincia'";
$resultado = $enlace->query($sql);
$tabla = "";
while ($row = $resultado->fetch_assoc()){
    $tabla .= "<option value='{$row["municipio"]}'>".utf8_encode($row["municipio"])."</option>";
}
utf8_encode($tabla);
echo $tabla;