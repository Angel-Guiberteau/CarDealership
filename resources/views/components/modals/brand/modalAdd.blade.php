<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('brandCreated') }}" method="POST" id="brandForm">
                    @csrf
                    <div class="mb-3 mt-3">
                        <input type="text" class="form-control" id="input" name="brand" placeholder="Nombre de marca *">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="sendButton" class="btn btn-secondary w-100">Agregar</button>
            </div>
                </form>
        </div>
    </div>
</div>