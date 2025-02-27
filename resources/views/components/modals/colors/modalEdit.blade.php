<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar color</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('colorUpdated') }}" method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <input type="hidden" name="color_id" id="id">
                            <label for="edit" class="form-label">Nombre de color <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit" name="name" placeholder="Color Seleccionado a Modificar">
                        </div>
                        <div class="mb-3">
                            <label for="editColorHex" class="form-label">Selecciona un color <span class="text-danger">*</span></label>
                            <input type="color" name="hex" class="form-control form-control-color" id="editColorHex" value="#000000">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  id="sendEdit" class="btn btn-secondary w-100">Guardar</button>
                </div>
            </form>
        </div> 
    </div>
</div>