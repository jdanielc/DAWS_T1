<html>
@include("\..\header.header", array('titulo'=>"Completar Tarea"))
<body>
<h2>Completar Tareas</h2>
@include('\..\tabla_tareas.tabla_tarea', array('tarea'=>$tarea))
<form action="" method="post">
    <table id="t_complete">
        <input type="hidden" name="id" value="{{$id}}"/>
        @if($tarea->getEstado() != "R")
        <tr>
            <td><input type="radio" name="estado" value="R" checked="checked">Realizada</td>
            <td><input type="radio" name="estado" value="P">Pendiente</td>
            <td><input type="radio" name="estado" value="C">Cancelada</td>
        </tr>
            @else
            <input type="hidden" name="estado" value="R"/>
        @endif
    </table>
    <table id="t_complete">
        <tr>
            <td>Anotaciones Previas</td>
            <td>Anotaciones Posteriores</td>
        </tr>
        <tr>
            <td><textarea name="texto_previo" id="texto_previo" cols="50" rows="10"></textarea></td>
            <td><textarea name="texto_posterior" id="texto_posterior" cols="50" rows="10"></textarea></td>
        </tr>
    </table>
    <input type="submit" value="Aceptar">
</form>
</body>
</html>