<html>
@include("\..\header.header", array('titulo'=>"Eliminar Tarea"))
<body>
<div class="titulo">
    <h2>Tareas A Eliminar</h2>
</div>

<table class="table table-bordered">
    <tr>
        <th>Operario</th>
        <th>Administrativo</th>
        <th>Fecha de creacion</th>
        <th>Fecha de realización</th>
        <th>Direccion</th>
        <th>Poblacion</th>
        <th>Provincia</th>
        <th>CP</th>
        <th>Estado</th>
        <th>Anotaciones Previas</th>
        <th>Anotaciones Posteriores</th>
    </tr>
    <tr>
        <td><p>{{$tarea->getOperario()}}</p></td>
        <td><p>{{$tarea->getAdministrativo()}}</p></td>
        <td><p>{{$tarea->getFechaCreacion()}}</p></td>
        <td><p>{{$tarea->getFechaRealizacion()}}</p></td>
        <td><p>{{$tarea->getDireccion()}}</p></td>
        <td><p>{{$tarea->getPoblacion()}}</p></td>
        <td><p>{{$tarea->getProvincia()}}</p></td>
        <td><p>{{$tarea->getCp()}}</p></td>
        <td><p>{{$tarea->getEstado()}} </p></td>
        <td><p>{{$tarea->getAnotacionesAnt()}}</p></td>
        <td><p>{{$tarea->getAnotacionesPost()}}</p></td>
    </tr>
</table>

<footer class="row">
    <form action="" method="post" class="col-sm-1">
        <input type="hidden" name="delete[]" value="delete"/>
        <input type="hidden" name="id" value="{{$id}}"/>
        <button class="btn btn-danger">Eliminar</button>
    </form>
    <form action="" method="post">
        <input type="hidden" name="delete[]" value="cancel"/>
        <input type="hidden" name="id" value="{{$id}}"/>
        <button class="btn btn-primary">Cancelar</button>
    </form>
</footer>
</body>
</html>