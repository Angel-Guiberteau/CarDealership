<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo tipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addType') }}" method="POST" id="typeForm">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="input" class="form-label">Tipo de Coche <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="input" name="type" placeholder="Tipo de Coche *">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="sendButton" class="btn btn-secondary w-100">Agregar</button>
            </div>
                </form>
        </div>
    </div>
</div>