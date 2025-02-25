<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #e0e0e0;">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="addVehicleLabel">Agregar Vehículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="vehiculoForm">
                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Marca *</label>
                        <select class="form-select" name="brand" required>
                            <option selected disabled hidden>Seleccionar Marca</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Modelo *</label>
                        <input type="text" class="form-control" name="model" placeholder="Nombre del modelo *" required>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Color *</label>
                        <select class="form-select" name="color" required>
                            <option selected disabled hidden>Seleccionar Color</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Tipo *</label>
                        <select class="form-select" name="type" required>
                            <option selected disabled hidden>Seleccionar Tipo</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <div class="d-flex justify-content-between mb-3">
                            <output id="precioOutput">0€</output>
                            <span>120.000€</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="form-label">Precio*</label>
                            <input type="range" class="form-range" min="0" max="120000" step="1000" id="precioRange" name="price" value="0" oninput="precioOutput.innerText = precioRange.value + '€'" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <div class="d-flex justify-content-between mb-3">
                            <output id="potenciaOutput">0CV</output>
                            <span>1000CV</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label class="form-label">Potencia*</label>
                            <input type="range" class="form-range" min="0" max="1000" step="10" id="potenciaRange" name="power" value="0" oninput="potenciaOutput.innerText = potenciaRange.value + 'CV'" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded d-flex justify-content-between align-items-center">
                        <label class="form-check-label" for="enOferta">En Oferta</label>
                        <input class="form-check-input ms-auto" type="checkbox" name="offer" id="enOferta">
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Adjuntar Imagen *</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept="image/*" name="image" id="imagenInput" required>
                            <label class="input-group-text" for="imagenInput">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </div>
    </div>
</div>
