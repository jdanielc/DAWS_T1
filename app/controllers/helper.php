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

function MakeURL($ctrl, $action='', $parameters='')
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
