<!-- Modal Agregar Vehículo -->
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
                        <select class="form-select" required>
                            <option selected disabled>Seleccionar Marca</option>
                            <option>Marca 1</option>
                            <option>Marca 2</option>
                        </select>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <input type="text" class="form-control" placeholder="Nombre del modelo *" required>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <select class="form-select" required>
                            <option selected disabled>Seleccionar Color</option>
                            <option>Rojo</option>
                            <option>Azul</option>
                        </select>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <select class="form-select" required>
                            <option selected disabled>Seleccionar Tipo</option>
                            <option>SUV</option>
                            <option>Deportivo</option>
                        </select>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <div class="d-flex justify-content-between mb-3">
                            <output id="precioOutput">0€</output>
                            <span>120.000€</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="precioRange" class="form-label me-3">Precio*</label>
                            <input type="range" class="form-range" min="0" max="120000" step="1000" id="precioRange" value="0" oninput="precioOutput.innerText = precioRange.value + '€'" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <div class="d-flex justify-content-between mb-3">
                            <output id="potenciaOutput">0CV</output>
                            <span>1000CV</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="potenciaRange" class="form-label me-3">Potencia*</label>
                            <input type="range" class="form-range" min="0" max="1000" step="10" id="potenciaRange" value="0" oninput="potenciaOutput.innerText = potenciaRange.value + 'CV'" style="flex-grow: 1;">
                        </div>
                    </div>                                                         
                    <div class="mb-3 bg-white p-3 rounded d-flex justify-content-between align-items-center">
                        <label class="form-check-label" for="enOferta">En Oferta</label>
                        <input class="form-check-input ms-auto" type="checkbox" id="enOferta">
                    </div>
                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Adjuntar Imagen *</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept="image/*" id="imagenInput">
                            <label class="input-group-text" for="imagenInput">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                            </label>
                            <label class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
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
