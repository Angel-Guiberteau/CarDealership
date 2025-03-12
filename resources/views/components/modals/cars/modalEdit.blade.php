<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="editVehicleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #e0e0e0;">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="editVehicleLabel">Editar Vehículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="editVehiculoForm" method="post" action="{{ route('updateCar') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="car_id" id="car_id">
                    <input type="hidden" name="deleted_images" id="deleted_images" value="">

                    <div class="mb-3 bg-white p-3 rounded">
                        <label for="brand" class="form-label">Marca <span class="text-danger">*</span></label>
                        <select class="form-select" name="brand" id="brand" required>
                            <option disabled hidden selected>Seleccionar Marca</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label for="modelo" class="form-label">Modelo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="model" id="modelo" required>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                        <select class="form-select" name="color" id="color" required>
                            <option disabled hidden selected>Seleccionar Color</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label for="type_id" class="form-label">Tipo <span class="text-danger">*</span></label>
                        <select class="form-select" name="type_id" id="type_id" required>
                            <option disabled hidden selected>Seleccionar Tipo</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label for="year" class="form-label">Año <span class="text-danger">*</span></label>
                        <input type="text" class="form-control edityear" name="year" id="year" required>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <div class="d-flex justify-content-between mb-3">
                            <output id="precioOutputEdit">0€</output>
                            <span>120.000€</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="precioRangeEdit" class="form-label me-3">Precio<span class="text-danger" style="white-space: nowrap;"> *</span></label>
                            <input type="range" class="form-range" min="0" max="120000" step="1000" id="precioRangeEdit" name="price" value="0" oninput="precioOutputEdit.innerText = precioRangeEdit.value + '€'" style="flex-grow: 1;">
                        </div>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <div class="d-flex justify-content-between mb-3">
                            <output id="potenciaOutputEdit">0CV</output>
                            <span>1000CV</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="potenciaRangeEdit" class="form-label me-3">Potencia<span class="text-danger" style="white-space: nowrap;"> *</span></label>
                            <input type="range" class="form-range" min="0" max="1000" step="10" id="potenciaRangeEdit" name="horse_power" value="0" oninput="potenciaOutputEdit.innerText = potenciaRangeEdit.value + 'CV'" style="flex-grow: 1;">
                        </div>
                    </div>

                    <div class="mb-3 bg-white p-3 rounded d-flex justify-content-between align-items-center">
                        <label class="form-check-label" for="enOfertaEdit">En Oferta</label>
                        <input class="form-check-input ms-auto" type="checkbox" name="sale" id="enOfertaEdit">
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Imagen Principal <span class="text-danger">*</span></label>
                        <br>
                        <img src="" id="main_image_preview" class="img-fluid rounded mb-2" alt="Imagen Principal">
                        <input type="file" class="form-control" accept="image/*" name="main_image">
                    </div>

                    <div class="mb-3 bg-white p-3 rounded">
                        <label class="form-label">Imágenes Secundarias</label>
                        <div class="row" id="secondary_images_container">
                        </div>
                        <button class="input-group-text" type="button" id="addImageButton">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
                        </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary edit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>