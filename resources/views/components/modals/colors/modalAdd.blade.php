<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo color</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="brand" placeholder="Nombre del color *">
                    </div>
                    <div class="mb-3">
                        <label for="colorHex" class="form-label">Selecciona un color</label>
                        <input type="color" class="form-control form-control-color" id="colorHex" value="#000000">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary w-100">Añadir</button>
            </div>
        </div>
    </div>
</div>