<!DOCTYPE html>
<html lang="es">
@include("\..\header.header", array('titulo'=>"Ver Tareas"))
<body>
<div class="titulo">
    <h2>Tareas Existentes</h2>
</div>

<div id="encabezado">
    <form action="ctr_formularioTareas.php" method="post" id="form_add">
        <input type="hidden" name="action" value="add"/>
        <button class="btn btn-link"><i class="fas fa-plus"></i>Añadir Tarea</button>
    </form>
    @if(isset($busqueda))
        <form action="ctr_verTareas.php" id="form_back">
            <button type="submit" class="btn btn-link">
                <i class='fas fa-arrow-left'></i>Volver
            </button>
        </form>
    @endif
    <form action="ctr_busqueda.php" method="post" id="form_seach">
        <div>
            <input type="text" placeholder="Buscar..." id="buscar" name="buscar" @if(isset($busqueda)) value="{{$busqueda}}" @endif>
            <button type="submit" class="btn btn-light">
                <i class='fas fa-search'></i>Buscar
            </button>
        </div>
    </form>
</div>

<div class="row">
    @include("\..\menu.menu")
    <div class="col-sm-10 table-wrap">
    <table class="table table-bordered table-responsive">
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
        <th>Acciones</th>

    </tr>
    @for($i= 0; $i < $limit; $i++)
        @if(($i + $starting_limit) < $total_result)

        @set($tarea = $tareas[$i + $starting_limit])
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
            <td><ul class="lista_botones">
                    <li>
                        <form action="ctr_borrarTarea.php" method="post">
                            <input type="hidden" name="id" value="{{$tarea->getId()}}" />
                            <button class="linkb"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        </form>
                    </li>
                    <li>
                        <form action="ctr_formularioTareas.php" method="post">
                            <input type="hidden" name="id" value="{{$tarea->getId()}}" />
                            <input type="hidden" name="action" value="mod"/>
                            <button class="linkb"><i class="fas fa-edit"></i>Modificar</button>
                        </form>
                    </li>
                    <li>
                        <form action="ctr_completarTarea.php" method="post">
                            <input type="hidden" name="id" value="{{$tarea->getId()}}" />
                            <button class="linkb"><i class="fas fa-check-circle"></i>Completar</button>
                        </form>
                    </li>
                </ul></td>
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