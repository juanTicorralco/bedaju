 <!-- details -->
 <div class="form-group">
            <label>Detalles del trabajo<sup class="text-danger">*</sup>EX: <strong>title:</strong> Bloutwe, <strong>Value:</strong> yes</label>
            <input type="hidden" name="inputDetails" value="1">
            <div class="row mb-3 inputDetails">
                <div class="col-12 col-lg-6 form-group__content input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <button type="button" class="btn btn-danger" onclick="removedInput(0,'inputDetails')">&times;</button>
                        </span>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Title:
                        </span>
                    </div>
                    <input 
                    class="form-control"
                    type="text"
                    name="detailsTitleProduct_0"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <div class="col-12 col-lg-6 form-group__content input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Value:
                        </span>
                    </div>
                    <input 
                    class="form-control"
                    type="text"
                    name="detailsValueProduct_0"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-2 btn-large" onclick="addInput(this,'inputDetails')">Agregar element</button>
        </div>
        <!-- Especificaciones -->
        <div class="form-group">
            <label>Especifications Product<sup class="text-danger">*</sup>EX: <strong>Type:</strong> Color, <strong>Values:</strong> black,green,yelow</label>
            <input type="hidden" name="inputEspesifications" value="1">
            <div class="row mb-3 inputEspesifications">
                <div class="col-12 col-lg-6 form-group__content input-group">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <button type="button" class="btn btn-danger" onclick="removedInput(0,'inputEspesifications')">&times;</button>
                        </span>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Type:
                        </span>
                    </div>
                    <input 
                    class="form-control"
                    type="text"
                    name="EspesificTypeProduct_0"
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <div class="col-12 col-lg-6 form-group__content input-group">
                    <input 
                    class="form-control tags-input"
                    data-role="tagsinput"
                    type="text"
                    name="EspesificValuesProduct_0"
                    placeholder="Escribe y preciona enter" 
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-2 btn-large" onclick="addInput(this,'inputEspesifications')">Agregar element</button>
        </div>