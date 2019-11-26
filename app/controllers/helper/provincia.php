<?php


$enlace = mysqli_connect("localhost", "root", "", "daw_proyecto_1");
$sql = "SELECT * FROM provincias";
$resultado = $enlace->query($sql);

$emp = $resultado->fetch_assoc();

$tabla = "";

while ($row = $resultado->fetch_assoc()){

    $tabla .= "<option value='{$row["provincia"]}'>".utf8_encode($row["provincia"])."</option>";
}
echo $tabla;
