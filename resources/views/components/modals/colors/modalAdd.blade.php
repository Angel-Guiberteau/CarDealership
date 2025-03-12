<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo color</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addColor')}}" method="post" accept-charset="UTF-8" >
                @csrf
                <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <label for="input" class="form-label">Nombre del color <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="input" placeholder="Nombre del color *">
                            <div id="errorInput" class="invalid-feedback" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="colorHex" class="form-label">Selecciona un color <span class="text-danger">*</span></label>
                            <input type="color" name="hex" class="form-control form-control-color" id="colorHex" value="#000000">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="sendButton" class="btn btn-secondary w-100">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>