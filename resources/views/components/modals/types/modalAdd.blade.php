<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo tipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addType')}}" method="post" accept-charset="UTF-8" >
                @csrf
                <div class="modal-body">
                        <div class="mb-3 mt-3">
                            <input type="text" class="form-control" name='name' id="type" placeholder="Nombre *">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary w-100">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>