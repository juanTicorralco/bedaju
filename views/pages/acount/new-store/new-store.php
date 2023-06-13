<?php
if (!isset($_SESSION['user'])) {
    echo '<script>
            window.location="' . $path . 'acount&login";
    </script>';
    return;
}else{
    $time= time();
    if($_SESSION["user"]->token_exp_user < $time){
        echo '<script>
        switAlert("error", "Para proteger tus datos, si no hay actividad en tu cuenta, se cierra automaticamente. Vuelve a logearte!", "' . $path . 'acount&logout","");            
        </script>';
        return;
    }else{
        // traer la lista de deseos
        // $select="url_product,url_category,name_product,image_product,price_product,offer_product,stock_product";
        // $products= array();
        // foreach($wishlist as $key => $value){  
        //     $url= CurlController::api()."relations?rel=products,categories&type=product,category&linkTo=url_product&equalTo=".$value."&select=".$select;
        //     $method= "GET";
        //     $header= array();
        //     $filds= array();
        //     $response= CurlController::request($url, $method, $header, $filds);
        //     array_push($products, $response->result[0]);
        // }
    }
}
?>
<!--=====================================
My Account Content
======================================--> 
<div class="ps-vendor-dashboard pro">
    <div class="container">
        <div class="ps-section__header">
            <!--=====================================
            Profile
            ======================================--> 
            <?php include "views/pages/acount/profile/profile.php"; ?>
            <!--=====================================
            Nav Account
            ======================================--> 
            <div class="ps-section__content">
                <ul class="ps-section__links">
                    <li ><a href="<?php echo $path; ?>acount&wishAcount">Guardados</a></li>
                    <li ><a href="<?php echo $path; ?>acount&my-shopping">Pedidos</a></li>
                    <li class="active"><a href="<?php echo $path; ?>acount&my-worker">Trabajador</a></li>
                    <li><a href="<?php echo $path; ?>acount&my-sales">Metricas</a></li>
                </ul>
                <!--=====================================
                New Store
                ======================================--> 
                <div class="ps-page__content text-center row">
                    <div class="container">
                        <div class="ps-section__header">
                            <h1>Nuevo en BEDAJU?</h1>
                            <h4>Unete al lugar donde las personas podran encontrarte <br> Y contratar tus servicios como profecional</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="img/shop-1.jpg" class="img-fluid">
                                    </div>
                                    <div class="card-footer text-center">
                                        <button 
                                        class="btn btn-warning btn-lg"
                                        data-toggle="tab"
                                        href="#terms"
                                        onclick="goTermins()"
                                        ><span class="badge badge-secondary">1</span> Aceptar terminos y condiciones</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="img/shop-2.jpg" class="img-fluid">
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-warning btn-lg disabled btnCreateStore"><span class="badge badge-secondary">2</span> Crear Perfil</button>
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-4 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="img/shop-3.jpg" class="img-fluid">
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-warning btn-lg disabled btnCreateProduct"><span class="badge badge-secondary">3</span> Subir Trabajo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modules -->
                        <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo CurlController::api();?>" id="urlApi">
                            <div class="tab-content" id="tabContent">
                                <?php
                                    include "modules/terms.php";
                                    include "modules/form-store.php";
                                    include "modules/form-product.php";
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>