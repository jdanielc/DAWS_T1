<?php
function VerErrores($campo)
{
    global $errores;
    if (isset($errores[$campo]))
    {
        echo "<p style='color: red'>".$errores[$campo]."</p>";
    }

}

$_SESSION["provincia"] = $datos["provincia"];
$_SESSION["municipios"] = $datos["txtPoblacion"];

?>
<html>
@if($action == "add")
    @include("\..\header.header", array('titulo'=>"Añadir Tarea"))

@elseif($action == "mod")
    @include("\..\header.header", array('titulo'=>"Modificar Tarea"))

@endif
<body>
<div class="titulo">
    <h2 class="title">
    @if($action === "mod")
        Modificar Tarea
        @elseif($action === "add")
        Añadir Tarea
        @else
        Formulario
        @endif
</h2>
    <p></p>
</div>

<form     @if($action == "mod")
   action="ctr_modTarea.php"
        @elseif($action == "add")
            action="ctr_addTareas.php"
                @endif
                 method="post">

<table id="formulario" class="table table-bordered">
    <tr>
        <td>
            <label for="txtOperario">Operario</label>
            <input type="text" id="txtOperario" name="txtOperario" value="{{$datos["txtOperario"]}}">
            <?=VerErrores("txtOperario")?>
        </td>
        <td>
            <label for="txtAdmin">Administrador</label>
            <input type="text" id="txtAdmin" name="txtAdmin" value="{{$datos["txtAdmin"]}}">
            <?=VerErrores("txtAdmin")?>

        </td>
    </tr>
    <tr>
        @if($action == "mod")
            <td>
                <label for="fecha_creacion">Fecha de Creación</label>
                <input type="text" id="fecha_creacion" name="fecha_creacion" placeholder="dd-mm-yyyy"  value="{{$datos["fecha_creacion"]}}"
                       @if($action == "mod")
                       disabled
                >
                <input type="hidden" name="fecha_creacion" value="{{$datos["fecha_creacion"]}}"
                        @endif
                >
                <?=VerErrores("fecha_creacion")?>
            </td>
            <td>
                <label for="fecha_realizacion">Fecha Realizacion</label>
                <input type="text" id="fecha_realizacion" name="fecha_realizacion" placeholder="dd-mm-yyyy"  value="{{$datos["fecha_realizacion"]}}">
                <?=VerErrores("fecha_realizacion")?>

            </td>
            @endif
    </tr>
    <tr>
        <td>
            <label for="txtDireccion">Dirección</label>
            <input type="text" id="txtDireccion" name="txtDireccion"  value="{{$datos["txtDireccion"]}}">
            <?=VerErrores("txtDireccion")?>

        </td>
        <td>
            <label for="txtPoblacion">Población</label>
            <!--<input type="text" id="txtPoblacion" name="txtPoblacion" value="{{$datos["txtPoblacion"]}}">-->

            <select name="txtPoblacion" id="txtPoblacion" value="{{$datos["txtPoblacion"]}}">
                <option></option>
            </select>

        <?=VerErrores("txtPoblacion")?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="provincia">Provincia</label>
            <select name="provincia" id="provincia" value="{{$datos["provincia"]}}">

            </select></td>
        <td>
            <label for="txtCP">Código Postal</label>
            <input type="text" id="txtCP" name="txtCP"  value="{{$datos["txtCP"]}}">
            <?=VerErrores("txtCP")?>

        </td>
    </tr>
    @if($action == "mod")
        <tr>
            <td colspan="2"><label for="estado">Estado: </label>
                <input type="radio" name="estado" value="R" @if($datos["estado"] ==="R") checked="checked" @endif>Realizada
                <input type="radio" name="estado" value="P" @if($datos["estado"] ==="P") checked="checked" @endif>Pendiente
                <input type="radio" name="estado" value="C" @if($datos["estado"] ==="C") checked="checked" @endif>Cancelada
            </td>
        </tr>
        @else
        <input type="hidden" name="estado" value="P">
        @endif
    <tr>
        <td>
            <label for="anotaciones_ant">Anotaciones Anteriores</label>
        </td>

            @if($action == "mod")
                <td>
                    <label for="anotaciones_pos">Anotaciones Posteriores</label>
                </td>
            @endif

    </tr>
    <tr>
        <td>
            <textarea name="anotaciones_ant" id="anotaciones_ant" cols="50" rows="10">{{$datos["anotaciones_ant"]}}</textarea>
            </td>
        @if($action == "mod")

            <td>
                <textarea name="anotaciones_pos" id="anotaciones_pos" cols="50" rows="10">{{$datos["anotaciones_pos"]}}</textarea>
            </td>
            @endif
    </tr>
</table>
    <input type="hidden" name="id" id="id" value="{{$id}}">
    <input type="hidden" name="action" value="{{$action}}">
    <input type="submit" value="Aceptar" class="btn btn-primary" id="bt_aceptar">
</form>
<!--
<form action="ctr_verTareas.php" id="form_back">
    <button type="submit" class="btn btn-primary">
        <i class='fas fa-arrow-left'></i>Volver
    </button>
</form>
-->
<form action="Front_Controller.php" method="get">
    <input type="hidden" value="ctr_verTareas.php" name="a">
    <button type="submit" class="btn btn-link">
        <i class='fas fa-arrow-left'></i>Volver
    </button>
</form>
</body>
</html>