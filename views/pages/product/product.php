<!-- traer toda la informacion del producto -->
<?php
$url9 = CurlController::api() . "relations?rel=jobs,categories,subcategories&type=job,category,subcategory&linkTo=url_job,approval_job,state_job&equalTo=" . $urlParams[0].",approved,show&select=url_category,image_job,name_job,views_job,id_job,name_category,url_subcategory,name_subcategory,gallery_job,summary_job,video_job,specifications_job,tags_job,description_job,details_job,url_job,id_user_job,likes_job";
$method9 = "GET";
$field9 = array();
$header9 = array();
$producter = CurlController::request($url9, $method9, $field9, $header9)->result[0];

if($producter == "n"){
    echo '<script>
        switAlert("error", "Este articulo no es visible o falta aprovacion", "' . $path . '","");
    </script>';
    return;
}

$url2=CurlController::api()."relations?rel=workers,subcategories&type=worker,subcategory&linkTo=url_subcategory,show_worker&equalTo=".$producter->url_subcategory.",show&select=id_subcategory";
$totalworkers = CurlController::request($url2, $method9, $field9, $header9);
if($totalworkers->status == 200){
    $totalworkers = $totalworkers->total;
}else{
    $totalworkers = 0;
}

$url3=CurlController::api()."workers?linkTo=show_worker&equalTo=show&select=id_worker";
$totalworkerser = CurlController::request($url3, $method9, $field9, $header9);
if($totalworkerser->status == 200){
    $totalworkerser = $totalworkerser->total;
}else{
    $totalworkerser = 0;
}

$url9 = CurlController::api() . "relations?rel=workers,users&type=worker,user&linkTo=id_user_worker&equalTo=" . $producter->id_user_job."&select=price_worker,displayname_user,about_worker,url_worker,picture_user,id_worker,email_worker,id_user,username_user";
$workerter = CurlController::request($url9, $method9, $field9, $header9)->result[0];


/* actualizar las vistas de productos */
$viewsProduct= $producter->views_job+1;
$url12= CurlController::api()."jobs?id=".$producter->id_job."&nameId=id_job&token=no&except=views_job";
$method12= "PUT";
$field12= "views_job=".$viewsProduct;
$header12=array();
$upDateProduct= CurlController::request($url12,$method12,$field12, $header12); 
?>
<!--=====================================
	call to action 
======================================-->
<?php include "modules/callToAction.php"; ?>
<!--=====================================
Breadcrumb
======================================-->
<?php include "modules/breadCrumb.php"; ?>
<!--=====================================
Product Content
======================================-->
<div class="ps-page--product">
    <div class="ps-container">
        <!--=====================================
        Product Container
        ======================================-->
        <div class="ps-page__container">
            <!--=====================================
            Left Column
            ======================================-->
            <div class="ps-page__left">
                <div class="ps-product--detail ps-product--fullwidth">
                    <!--=====================================
                    Product Header
                    ======================================-->
                    <!-- <div class="container-fluid preloadTrue">
                        <div class="ph-item">
                            <div class="ph-col-6">
                                <div class="ph-item border-0">
                                    <div class="ph-col-2">
                                        <div class="ph-picture" style="height:300px"></div>
                                    </div>
                                    <div class="ph-col-10">
                                        <div class="ph-picture" style="height:300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ph-col-6">
                                <div class="ph-row mt-5">
                                    <div class="ph-col-4 big"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-6 big"></div>
                                    <div class="ph-col-8 empty"></div>
                                    <div class="ph-col-8"></div>
                                    <div class="ph-col-4 empty"></div>
                                    <div class="ph-col-12 big"></div>
                                    <div class="ph-col-6 big" style="height:70px"></div>
                                    <div class="ph-col-6 empty"></div
                                    <div class="ph-col-8 big"></div>
                                    <div class="ph-col-4 empty"></div>
                                    <div class="ph-col-12"></div>
                                    <div class="ph-col-8"></div>
                                    <div class="ph-col-4 empty"></div>
                                    <div class="ph-col-12 big"></div>
                                    <div class="ph-col-12" style="height:70px"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="ps-product__header ">
                        <!--=====================================
                        Gallery
                        ======================================-->
                        <?php include "modules/gallery.php"; ?>
                        <!--=====================================
                        Product Info
                        ======================================-->
                        <?php include "modules/infoProduct.php"; ?>
                    </div> <!-- End Product header -->
                    <!--=====================================
                    Product Content
                    ======================================-->
                    <div class="ps-product__content ps-tab-root">
                        <!-- Comprados con frecuencia -->
                        <?php //include "modules/frecuently.php"; ?>
                        <!-- menu del producto -->
                        <?php include "modules/menuProduct.php"; ?>
                    </div><!--  End product content -->
                </div>
            </div><!-- End Left Column -->
            <!--=====================================
            Right Column
            ======================================-->
            <div class="ps-page__right d-block d-sm-none d-xl-block">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Envios a toda la republica </p>
                    <p><i class="icon-3d-rotate"></i> Devolución gratuita en 7 días si es elegible, muy fácil</p>
                    <p><i class="icon-receipt"></i> Se factura este producto.</p>
                    <p><i class="icon-credit-card"></i> Pague en línea o al recibir el producto</p>
                </aside>
                <!-- misma marca -->
                <?php include "modules/someBrand.php"; ?>
            </div><!-- End Right Column -->
        </div><!--  End Product Container -->
        <!--=====================================
        Customers who bought
        ======================================-->
        <?php include "modules/coustomersWhoBouht.php"; ?>
        <!--=====================================
        Related products
        ======================================-->
        <?php include "modules/relatedProducts.php"; ?>
    </div>
</div><!-- End Product Content -->