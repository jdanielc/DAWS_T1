@set($anterior = $page -1)
@set($siguiente = $page +1)

@if($page != 1 and $page != 0)
    <a href="?page={{$anterior}}" class="links">Anterior</a>
    @endif

@set($pagina = $page)
@for($pagina = 1; $pagina <= $total_pages; $pagina++)
        <a href="?page={{$pagina}}" class="links">{{$pagina}}</a>
    @endfor

@if($page < $total_pages or $page === $total_pages)
    @if($total_pages>1)
        <a href="?page={{$siguiente}}" class="links">Siguiente</a>
    @endif
    @endif
