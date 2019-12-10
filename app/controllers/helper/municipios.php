<?php

session_start();

$provincia = $_SESSION["provincia"];
$municipio = $_SESSION["municipios"];

try {
    $dsn = "mysql:host=localhost;dbname=daw_proyecto_1";
    $dbh = new PDO($dsn, "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
}

if ($provincia === "" && !isset($_POST["municipio"])){
    $provincia = "Albacete";
}else if (isset($_POST["municipio"])){
    $provincia = $_POST["municipio"];
}

$provincia = utf8_decode($provincia);
$stmt = $dbh->prepare("SELECT municipio FROM municipios INNER JOIN provincias ON provincias.id = municipios.provincia WHERE provincias.provincia = :provincia");
$stmt->bindParam(":provincia", $provincia, PDO::PARAM_STR);
$stmt->setFetchMode(PDO::FETCH_ASSOC);


$stmt->execute();

$tabla = "";
while ($row = $stmt->fetch()){
    if($municipio === $row["municipio"]){
        $tabla .= "<option value='".utf8_encode($row["municipio"])."' selected='selected'>".utf8_encode($row["municipio"])."</option>";
    }else{
        $tabla .= "<option value='".utf8_encode($row["municipio"])."'>".utf8_encode($row["municipio"])."</option>";

    }
}



echo $tabla;