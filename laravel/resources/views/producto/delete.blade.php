<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$producto->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{route('producto.destroy',$producto->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">

            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                Desea Eliminar el Registro {{$producto->nombre}} ?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <input type="submit" class="btn btn-danger btn-sm" onclick="" value="Eliminar">
                </div>
            </div>
         </form>

    </div>
</div>
