 <!-- pv, pe, envio, stock -->
 <div class="form-group">
            <div class="row mb-3">
                <!-- precio venta -->
                <div class="col-12 col-lg-3">
                    <label>Price Product <sup class="text-danger">*</sup></label>
                    <div class="form-group__content input-group mx-0 pr-0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Price $:
                            </span>
                        </div>
                        <input 
                        type="number"
                        class="form-control"
                        name="price"
                        min="0"
                        step="any"
                        pattern = "[.\\,\\0-9]{1,}"
                        onchange="validatejs(event, 'numbers')"
                        required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Acompleta el campo</div>
                    </div>
                </div>
                <!-- envio -->
                <div class="col-12 col-lg-3">
                    <label>Envio Product <sup class="text-danger">*</sup></label>
                    <div class="form-group__content input-group mx-0 pr-0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Envio $:
                            </span>
                        </div>
                        <input 
                        type="number"
                        class="form-control"
                        name="envio"
                        min="0"
                        step="any"
                        pattern = "[.\\,\\0-9]{1,}"
                        onchange="validatejs(event, 'numbers')"
                        required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Acompleta el campo</div>
                    </div>
                </div>
                <!-- dias de entrega -->
                <div class="col-12 col-lg-3">
                    <label>Delivery time Product <sup class="text-danger">*</sup></label>
                    <div class="form-group__content input-group mx-0 pr-0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Entregar en:
                            </span>
                        </div>
                        <input 
                        type="number"
                        class="form-control"
                        name="entrega"
                        min="0"
                        pattern = "[0-9]{1,}"
                        onchange="validatejs(event, 'numbers')"
                        required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Acompleta el campo</div>
                    </div>
                </div>
                <!-- precio venta -->
                <div class="col-12 col-lg-3">
                    <label>Stock Product <sup class="text-danger">*</sup> (MAX: 100 unit)</label>
                    <div class="form-group__content input-group mx-0 pr-0">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                Stock:
                            </span>
                        </div>
                        <input 
                        type="number"
                        class="form-control"
                        name="stock"
                        min="0"
                        max="100"
                        pattern = "[0-9]{1,}"
                        onchange="validatejs(event, 'numbers')"
                        required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Acompleta el campo</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- oferta -->
        <div class="form-group">
            <label>Offer Product Ex: <strong>Type: </strong>Discount, <strong>Percent %: </strong>25, <strong>end ofer: </strong>10/10/2020</label>
            <div class="row mb-3">
                <div class="form-group__content input-group col-12 col-lg-4 mx-0 pr-0">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Type:
                        </span>
                    </div>
                    <select name="type_offer" class="form-control" onchange="changeOfer(event)">
                        <option value="">Select Discount</option>
                        <option value="Discount">Discount</option>
                        <option value="Fixed">Fixed</option>
                    </select>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- porcentaje -->
                <div class="form-group__content input-group col-12 col-lg-4 mx-0 pr-0">
                    <div class="input-group-append">
                        <span class="input-group-text typeOffer">
                            Percent %:
                        </span>
                    </div>
                    <input 
                    type="number"
                    class="form-control"
                    name="valueOffer"
                    min="0"
                    step="any"
                    pattern = "[0-9]{1,}"
                    onchange="validatejs(event, 'numbers')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- time -->
                <div class="form-group__content input-group col-12 col-lg-4 mx-0 pr-0">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            End Offer:
                        </span>
                    </div>
                    <input 
                    type="date"
                    class="form-control"
                    name="dateOffer">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
            </div>
        </div>