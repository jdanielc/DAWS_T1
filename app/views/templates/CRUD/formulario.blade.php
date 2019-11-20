<html>

@if($action == "add")
    @include("\..\header.header", array('titulo'=>"Añadir Tarea"))

@elseif($action == "mod")
    @include("\..\header.header", array('titulo'=>"Modificar Tarea"))

@endif
<body>
<h2 class="title">{{$action}}</h2>
<form     @if($action == "mod")
   action="ctr_modTarea.php"
        @elseif($action == "add")
            action="ctr_addTareas.php"
                @endif
                 method="post">

<table id="formulario">
    <tr>
        <td>
            <label for="txtOperario">Operario</label>
            <input type="text" id="txtOperario" name="txtOperario" value="{{$datos["txtOperario"]}}">
            @if(isset($errores["txtOperario"]))
                <span class="error">{{$errores["txtOperario"]}}</span>
                @endif
        </td>
        <td>
            <label for="txtAdmin">Administrador</label>
            <input type="text" id="txtAdmin" name="txtAdmin" value="{{$datos["txtAdmin"]}}">
            @if(isset($errores["txtAdmin"]))
                <span class="error">{{$errores["txtAdmin"]}}</span>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="text" id="fecha_creacion" name="fecha_creacion" placeholder="dd-mm-yyyy"  value="{{$datos["fecha_creacion"]}}">
            @if(isset($errores["fecha_creacion"]))
                <span class="error">{{$errores["fecha_creacion"]}}</span>
            @endif
        </td>
        @if($action == "mod")
            <td>
                <label for="fecha_realizacion">Fecha Realizacion</label>
                <input type="text" id="fecha_realizacion" name="fecha_realizacion" placeholder="yyyy-mm-dd"  value="{{$datos["fecha_realizacion"]}}">
                @if(isset($errores["fecha_realizacion"]))
                    <span class="error">{{$errores["fecha_realizacion"]}}</span>
                @endif
            </td>
            @endif
    </tr>
    <tr>
        <td>
            <label for="txtDireccion">Dirección</label>
            <input type="text" id="txtDireccion" name="txtDireccion"  value="{{$datos["txtDireccion"]}}">
            @if(isset($errores["txtDireccion"]))
                <span class="error">{{$errores["txtDireccion"]}}</span>
            @endif
        </td>
        <td>
            <label for="txtPoblacion">Población</label>
            <input type="text" id="txtPoblacion" name="txtPoblacion" value="{{$datos["txtPoblacion"]}}">
            @if(isset($errores["txtPoblacion"]))
                <span class="error">{{$errores["txtPoblacion"]}}</span>
            @endif
        </td>
    </tr>
    <tr>
        <td>
            <label for="provincia">Provincia</label>
            <select name="provincia" id="provincia">
                @foreach($provincias as $provincia)
                    <option value="{{$provincia}}">{{$provincia}}</option>
                    @endforeach
            </select></td>
        <td>
            <label for="txtCP">Código Postal</label>
            <input type="text" id="txtCP" name="txtCP"  value="{{$datos["txtCP"]}}">
            @if(isset($errores["txtCP"]))
                <span class="error">{{$errores["txtCP"]}}</span>
            @endif
        </td>
    </tr>
    @if($action == "mod")
        <tr>
            <td><label for="estado">Estado</label></td>
            <td><input type="radio" name="estado" value="R">Realizada
            <input type="radio" name="estado" value="P">Pendiente
            <input type="radio" name="estado" value="C">Cancelada</td>
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
            <textarea name="anotaciones_ant" id="anotaciones_ant" cols="50" rows="10" value="{{$datos["anotaciones_ant"]}}"></textarea>
            </td>
        @if($action == "mod")

            <td>
                <textarea name="anotaciones_pos" id="anotaciones_pos" cols="50" rows="10" value="{{$datos["anotaciones_pos"]}}"></textarea>
            </td>
            @endif
    </tr>
</table>
        <input type="hidden" name="action" value="{{$action}}">
        <input type="submit" value="Aceptar">

</form>
</body>
</html>