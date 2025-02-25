<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar tipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('typeUpdated') }}" method="POST" id="editTypeForm">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-3">
                        <input type="hidden" name="type_id" id="type_id">
                        <input type="text" class="form-control" id="editType" name="type" placeholder="Tipo Seleccionado a Modificar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="sendEdit" class="btn btn-secondary w-100">Guardar</button>
                <button type="submit" id="sendEdit" class="btn btn-secondary w-100">Guardar</button>
            </div>
                </form>
                </form>
        </div>
    </div>
</div>