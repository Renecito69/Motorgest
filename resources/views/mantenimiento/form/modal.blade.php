<div class="modal fade" id="modal-delete-{{$mantenimiento->id}}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('mantenimiento.destroy', $mantenimiento->id) }}" role="form" enctype="multipart/form-data">
        @method('DELETE')
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Mantenimiento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea eliminar el Mantenimiento</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>
