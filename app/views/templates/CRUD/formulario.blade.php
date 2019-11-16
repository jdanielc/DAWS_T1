<html>

@if($action == "crear")
    @include("\..\header.header", array('titulo'=>"Añadir Tarea"))

@elseif($action == "mod")
    @include("\..\header.header", array('titulo'=>"Modificar Tarea"))

@endif
<body>
<h2 class="title">{{$action}}</h2>
<form action="" method="post">
<table id="formulario">
    <tr>
        <td>
            <label for="txtOperario">Operario</label>
            <input type="text" id="txtOperario">
        </td>
        <td>
            <label for="txtAdmin">Administrador</label>
            <input type="text" id="txtAdmin">
        </td>
    </tr>
    <tr>
        <td>
            <label for="fecha_creacion">Fecha de Creación</label>
            <input type="text" id="fecha_creacion">
        </td>
        @if($action == "mod")
            <td>
                <label for="fecha_realizacion">Fecha Realizacion</label>
                <input type="text" id="fecha_realizacion">
            </td>
            @endif
    </tr>
    <tr>
        <td>
            <label for="txtDireccion">Dirección</label>
            <input type="text" id="txtDireccion">
        </td>
        <td>
            <label for="txtPoblacion">Población</label>
            <input type="text" id="txtPoblacion">
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
            <input type="text" id="txtCP">
        </td>
    </tr>
    @if($action == "mod")
        <tr>
            <td><label for="estado">Estado</label></td>
            <td><input type="radio" name="estado" value="R">Realizada</td>
            <td><input type="radio" name="estado" value="P">Pendiente</td>
            <td><input type="radio" name="estado" value="C">Cancelada</td>
        </tr>
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
            <textarea name="anotaciones_ant" id="anotaciones_ant" cols="30" rows="10"></textarea>
            </td>
        @if($action == "mod")

            <td>
                <textarea name="anotaciones_pos" id="anotaciones_pos" cols="30" rows="10"></textarea>
            </td>
            @endif
    </tr>
</table>
</form>
</body>
</html>