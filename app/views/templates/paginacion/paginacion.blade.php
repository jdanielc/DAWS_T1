@set($anterior = $page -1)
@set($siguiente = $page +1)
<ul class="pagination justify-content-center">
@if($page != 1 and $page != 0)
        <li class="page-item"> <a href="?page={{$anterior}}" class="page-link">Anterior</a></li>
    @endif

@set($pagina = $page)
@for($pagina = 1; $pagina <= $total_pages; $pagina++)
       <li class="page-item"> <a href="?page={{$pagina}}" class="page-link">{{$pagina}}</a></li>
    @endfor

@if($page < $total_pages or $page === $total_pages)
    @if($total_pages>1)
            <li class="page-item">  <a href="?page={{$siguiente}}" class="page-link">Siguiente</a></li>
    @endif
    @endif
</ul>