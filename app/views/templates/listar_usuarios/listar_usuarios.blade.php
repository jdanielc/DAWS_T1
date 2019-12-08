<html>
@include("\..\header.header", array('titulo'=>"Formulario Usuarios"))
    <body>
    <div class="titulo">
        <h2>Tareas Existentes</h2>
    </div>
    <div id="encabezado">
        <a href="ctr_verTareas.php"> <i class='fas fa-arrow-left'></i>Volver</a>
    </div>
    <div class="row">
        @include("\..\menu.menu")
        <div class="col-sm-10 table-wrap">
            <table class="table table-bordered">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
                @for($i= 0; $i < $limit; $i++)
                    @if(($i + $starting_limit) < $total_result)
                        @set($empleado = $empleados[$i + $starting_limit])
                        <tr>
                            <td><p>{{$empleado->getNombre()}}</p></td>
                            <td><p>{{$empleado->getApellido()}}</p></td>
                            <td><p>{{$empleado->getTlf()}}</p></td>
                            <td><p>{{$empleado->getEmail()}}</p></td>
                            <td><p>{{$empleado->getRol()}}</p></td>
                            <td>
                                <ul>
                                    <li>
                                        <form action="ctr_borrarUsuario.php" method="post">
                                            <input type="hidden" value="{{$empleado->getId()}}" name="usuario">
                                            <button class="btn btn-link"><i class="fas fa-delete"></i>Borrar Usuario</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endfor
            </table>
    </div>
    </div>
    <footer>
        @include("\..\paginacion\paginacion", array('page'=>$page, 'total_pages' => $total_pages))
    </footer>
    </body>
</html>