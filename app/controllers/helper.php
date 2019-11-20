<?php

function ValorPost($nombreCampo, $valorPorDefecto='')
{
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}

function VerErrores($campo)
{
    global $errores;
    if (isset($errores[$campo]))
    {
        echo "<p style='color: red'>".$errores[$campo]."</p>";
    }
}