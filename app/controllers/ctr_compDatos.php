<?php
function comprobarDatosBasicos(array $errores, array $enviar)
{
    if (!is_numeric(ValorPost("txtOperario"))) {
        $errores["txtOperario"] = "Introduzca un operario";
    } else {
        $enviar["txtOperario"] = ValorPost("txtOperario");
    }


    if (!is_numeric(ValorPost("txtAdmin"))) {
        $errores["txtAdmin"] = "Introduzca un administrador";
    } else {
        $enviar["txtAdmin"] = ValorPost("txtAdmin");
    }

    if (ValorPost("action") != "add") {

        if (!IsPost("fecha_creacion")) {
            $errores["fecha_creacion"] = "Introduzca una fecha valida";
        } else {

            $d1 = strtotime(ValorPost("fecha_creacion"));
            if (isValidDate($d1, true) && $d1 != false) {
                $enviar["fecha_creacion"] = date("Y-m-d", $d1);
            } else {
                $errores["fecha_creacion"] = "Introduzca una fecha valida";
            }
        }
    }else{
        $enviar["fecha_creacion"] = date("Y-m-d");
    }

    if (!IsPost("txtDireccion")) {
        $errores["txtDireccion"] = "Introduzca una direccion";
    } else {
        $enviar["txtDireccion"] = ValorPost("txtDireccion");
    }

    if (!IsPost("provincia")) {
        $errores["provincia"] = "Introduzca una provincia";
    } else {
        $enviar["provincia"] = ValorPost("provincia");
    }

    if (!IsPost("txtPoblacion")) {
        $errores["txtPoblacion"] = "Introduzca una población";
    } else {
        $enviar["txtPoblacion"] = ValorPost("txtPoblacion");
    }


    if (!IsPost("txtCP") || strlen(ValorPost("txtCP")) != 5) {
        $errores["txtCP"] = "Introduzca un codigo postal";
    } else {
        $enviar["txtCP"] = ValorPost("txtCP");
    }

    if (!IsPost("estado")) {
        $errores["estado"] = "";
    } else {
        $enviar["estado"] = ValorPost("estado");
    }

    if (!IsPost("anotaciones_ant")) {
        $enviar["anotaciones_ant"] = "";
    } else {
        $enviar["anotaciones_ant"] = ValorPost("anotaciones_ant");
    }
    return array($errores, $enviar);
}

/**
 * @param $d1
 * @return bool
 */
function isValidDate($d1, $inicio)
{
    try {
        $datenow = strtotime(date("d-m-Y"));
        $diferencia = $datenow - $d1;

        if ($inicio){
            if ($diferencia < 0) {
                return false;
            } else {
                return true;
            }
        }else{
            $diferencia = strtotime($_POST["fecha_creacion"]) - $d1;

            if ($diferencia > 0) {
                return false;
            } else {
                return true;
            }
        }

    } catch (Exception $e) {
        return false;
    }
}

function IsPost($nombre_campo){
    if (!isset($_POST[$nombre_campo]) || $_POST[$nombre_campo] === "" || $_POST[$nombre_campo] == null){
        return false;
    }else{
        return true;
    }
}

function ValorPost($nombreCampo, $valorPorDefecto='')
{
    if (isset($_POST[$nombreCampo]))
        return $_POST[$nombreCampo];
    else
        return $valorPorDefecto;
}