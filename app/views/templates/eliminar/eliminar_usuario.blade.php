<html>
@include("\..\header.header", array('titulo'=>"Borrar Usuario"))
<body>
    <form action="" method="post">
    <div class="table-wrap">
        <table class="table table-bordered">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
                    <tr>
                        <td><p>{{$empleado->getNombre()}}</p></td>
                        <td><p>{{$empleado->getApellido()}}</p></td>
                        <td><p>{{$empleado->getTlf()}}</p></td>
                        <td><p>{{$empleado->getEmail()}}</p></td>
                        <td><p>{{$empleado->getRol()}}</p></td>
                    </tr>
        </table>
        <input type="hidden" name="borrar" value="{{$empleado->getId()}}">
        <input type="submit" class="btn btn-danger" value="Borrar">
    </div>
    </form>
        <a class="btn btn-primary" href="Front_Controller.php?a=ctr_verTareas.php" role="button">Volver</a>
    </div>
</body>
</html>