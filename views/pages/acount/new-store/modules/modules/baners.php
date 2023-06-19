<!-- banner -->
<div class="form-group">
            <label>Banner Product<sup class="text-danger">*</sup></label>
            <figure class="pb-5">
                <img src="img/products/default/example-top-banner.png" alt="img" class="img-fluid">
            </figure>
            <div class="row mb-5">
                <!-- H3 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H3 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="20%"
                    name="topBannerH3Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- P1 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            P1 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Discount..."
                    name="topBannerP1Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- H4 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H4 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="For Books Of March"
                    name="topBannerH4Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- P2 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            P2 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Enter Promotion"
                    name="topBannerP2Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- Span -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Span Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="sale2019"
                    name="topBannerSpanTag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- Button -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Button Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Shop Now"
                    name="topBannerButtonTag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- imagen -->
                <div class="col-12">
                    <label>IMG Tag:</label>
                    <div class="form-group__content">
                        <label class="pb-5" for="topBanner">
                            <img src="img/products/default/default-top-banner.jpg" alt="img" class="img-fluid changeTopBanner">
                        </label>
                        <div class="custom-file">
                            <input 
                            type="file"
                            class="custom-file-input"
                            id="topBanner"
                            name="topBanner"
                            accept="image/"
                            maxSize="2000000"
                            onchange="validateImageJs(event,'changeTopBanner')"
                            required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Acompleta el campo</div>
                            <label for="topBanner" class="custom-file-label">Subir</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- baner por defecto -->
        <div class="form-group">
            <label>Banner Principal Product<sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <label class="pb-5" for="DefaultBanner">
                    <img src="img/products/default/default-banner.jpg" class="img-fluid changeDefaultBanner" style="width:500px;">
                </label>
                <div class="custom-file">
                    <input 
                    type="file"
                    id="DefaultBanner"
                    class="custom-file-input"
                    name="DefaultBanner"
                    accept="image/*"
                    maxSize="2000000"
                    onchange="validateImageJs(event,'changeDefaultBanner')"
                    required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">El logo es requerida</div>
                    <label for="DefaultBanner" class="custom-file-label">Subir</label>
                </div>
            </div>
        </div>
        <!-- slide horizontal -->
        <div class="form-group">
            <label>Slider Horizontal Product<sup class="text-danger">*</sup></label>
            <figure class="pb-5">
                <img src="img/products/default/example-horizontal-slider.png" alt="img" class="img-fluid">
            </figure>
            <div class="row mb-3">
                <!-- H4 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H4 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Limit Edition"
                    name="hSliderH4Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- h3-1 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H3-1 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Happy Summer"
                    name="hSliderH3_1Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- H3-2-->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H3-2 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Combo Super Cool"
                    name="hSliderH3_2Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- H3-3 -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H3-3 Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Up to"
                    name="hSliderH3_3Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- H3-4s -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            H3-4s Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="40%"
                    name="hSliderH3_4Tag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- Button -->
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Button Tag:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    placeholder="Shop Now"
                    name="hSliderButtonTag"
                    maxlength="50"
                    required
                    pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                    onchange="validatejs(event, 'parrafo')">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Acompleta el campo</div>
                </div>
                <!-- imagen -->
                <div class="col-12">
                    <label>IMG Tag:</label>
                    <div class="form-group__content">
                        <label class="pb-5" for="hSlider">
                            <img src="img/products/default/default-horizontal-slider.jpg" alt="img" class="img-fluid changehSlider">
                        </label>
                        <div class="custom-file">
                            <input 
                            type="file"
                            class="custom-file-input"
                            id="hSlider"
                            name="hSlider"
                            accept="image/"
                            maxSize="2000000"
                            onchange="validateImageJs(event,'changehSlider')"
                            required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Acompleta el campo</div>
                            <label for="hSlider" class="custom-file-label">Subir</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- lider vertical por defecto -->
        <div class="form-group">
            <label>Slider Vertical Product<sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <label class="pb-5" for="vSlider">
                    <img src="img/products/default/default-vertical-slider.jpg" class="img-fluid changevSlider" style="width:260px;">
                </label>
                <div class="custom-file">
                    <input 
                    type="file"
                    id="vSlider"
                    class="custom-file-input "
                    name="vSlider"
                    accept="image/*"
                    maxSize="2000000"
                    onchange="validateImageJs(event,'changevSlider')"
                    required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">El logo es requerida</div>
                    <label for="vSlider" class="custom-file-label">Subir</label>
                </div>
            </div>
        </div>