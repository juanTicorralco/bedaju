<div class="tab-pane container fade" id="crearProduct">
     <!-- Modal header -->
     <div class="modal-header">
        <h5 class="modal-title text-center">3.- SUBE TU PRIMER TRABAJO</h5>
    </div>
    <div class="modal-body text-left p-5">
        <!-- name store -->
        <div class="form-group">
            <label>Nombre del trabajo <sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <input 
                type="text"
                class="form-control"
                name="nameProduct"
                placeholder="Nombre de tu producto..." 
                required 
                pattern="[0-9A-Za-zñÑáéíóúÁÉÍÓÚ ]{1,}" 
                onchange="validatejs(event, 'parrafo')">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre es requerido</div>
            </div>
        </div>
        <!-- url store -->
        <!-- <div class="form-group">
            <label>URL store<sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <input 
                type="text"
                class="form-control"
                name="urlProduct"
                placeholder="URL de tu Producto..."
                readonly 
                required >
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre es requerido</div>
            </div>
        </div> -->
        <!-- Categories -->
        <!-- <div class="form-group">
            <label>Product Category<sup class="text-danger">*</sup></label>
            <?php
                // $url = CurlController::api()."categories?select=id_category,name_category,url_category";
                // $method= "GET";
                // $header= array();
                // $fields= array();
                
                // $Categories= CurlController::request($url, $method, $header, $fields)->result;
            ?>
            <div class="form-group__content">
                <select 
                class="form-control"
                name="categoryProduct"
                onchange="changecategory(event)"
                required>
                    <option value="">Select Category</option>
                    <?php //foreach($Categories as $key => $value):?>
                        <option value="<?php //echo $value->id_category."_".$value->url_category; ?>"><?php //echo $value->name_category; ?></option>
                    <?php //endforeach; ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre es requerido</div>
            </div>
        </div> -->
        <!-- Subcategories -->
        <!-- <div class="form-group subcategoryProduct" style="display: none ;">
            <label>Product Subcategory<sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <select 
                    class="form-control"
                    name="subcategoryProduct"
                    required>
                    <option value="">Select Subcategory</option>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre es requerido</div>
            </div>
        </div> -->
        <!-- description -->
        <div class="form-group">
            <label>Description <small>(Coloca una descripcion sobre el trabajo que realizaste)</small><sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <textarea class="summernote" name="descriptionProduct" required></textarea>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Acompleta el campo</div>
            </div>
        </div>
        <!-- resumen -->
        <div class="form-group">
            <label>Resumen del trabajo<sup class="text-danger">*</sup> Ejemp: Terminado en 3 meses</label>
            <input type="hidden" name="inputSummary" value="1">
            <div class="form-group__content input-group mb-3 inputSummary">
                <div class="input-group-append">
                    <span class="input-group-text">
                        <button type="button" class="btn btn-danger" onclick="removedInput(0,'inputSummary')">&times;</button>
                    </span>
                </div>
                <input 
                class="form-control"
                type="text"
                name="summaryProduct_0"
                required
                pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                onchange="validatejs(event, 'parrafo')">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Acompleta el campo</div>
            </div>
            <button type="button" class="btn btn-primary mb-2 btn-large" onclick="addInput(this,'inputSummary')">Agregar</button>
        </div>
        <?php //include "modules/detalles.php" ?>
        <!-- tags -->
        <div class="form-group">
            <label>Tags<sup class="text-danger">*</sup> Ejemp: casa, contruccion, albañil....</label>
            <div class="form-group__content input-group mb-3 inputTags">
                <input 
                class="form-control tags-input"
                type="text"
                data-role="tagsinput"
                name="tagsinput"
                required
                pattern = '[-\\(\\)\\=\\%\\&\\$\\;\\_\\*\\"\\#\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]{1,}'
                onchange="validatejs(event, 'parrafo')">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Acompleta el campo</div>
            </div>
        </div>
        <!-- imagen principal -->
        <div class="form-group">
            <label>Imagen Principal<sup class="text-danger">*</sup></label>
            <div class="form-group__content">
                <label class="pb-5" for="logoProduct">
                    <img src="img/jobs/default/default-image.jpg" class="img-fluid changeProduct" style="width:150px;">
                </label>
                <div class="custom-file">
                    <input 
                    type="file"
                    id="logoProduct"
                    class="custom-file-input"
                    name="logoProduct"
                    accept="image/*"
                    maxSize="2000000"
                    onchange="validateImageJs(event,'changeProduct')"
                    required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">La imagen es requerida</div>
                    <label for="logoProduct" class="custom-file-label">Subir</label>
                </div>
            </div>
        </div>
        <!-- galeria -->
        <label>Galeria del trabajo<sup class="text-danger">*</sup></label>
        <div class="dropzone mb-3">
            <div class="dz-message">
                Solo puedes subir imagenes que tengan 500 x 500 de tamaño
            </div>
        </div>
        <input type="hidden" name="galeryProduct">
        <?php //include "modules/baners.php"; ?>
        <!-- video -->
        <div class="form-group">
            <label>Video Del trabajo Ex: <strong>Type: </strong>Youtube, <strong>Id:</strong> 2h3h2h2b3</label>
            <div class="row mb-3">
                <div class="col-12 col-lg-6 form-group__content input-group mx-0 pr-0">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Type:
                        </span>
                    </div>
                    <select name="type_video" class="form-control">
                        <option value="">Select Platform</option>
                        <option value="youtube">YouTube</option>
                        <option value="vimeo">Vimeo</option>
                    </select>
                </div>
                <div class="col-12 col-lg-6 form-group__content input-group mx-0">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            Id:
                        </span>
                    </div>
                    <input 
                    type="text"
                    class="form-control"
                    name="id_video"
                    maxlength="100"
                </div>
            </div>
        </div>
       <?php //include "modules/precios.php";?>
    </div>
    <div class="modal-footer">
        <div class="form-group submit">
            <button class="ps-btn ps-btn-fullwidth saveBtn" type="submit">Crear</button>
            <?php 
                $newVendor = new ControllerVendor();
                $newVendor->newVendor();
            ?>
        </div>
    </div>
</div>