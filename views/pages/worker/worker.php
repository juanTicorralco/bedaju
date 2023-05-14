<?php
    $select = "cover_worker,picture_user,displayname_user,email_worker,country_worker,city_worker,address_worker,phone_worker,socialnetwork_worker,id_worker,url_worker,about_worker,id_user_worker,reviews_worker,id_user,username_user,specialties_worker,times_hired_worker,times_budgeted_worker";
    $url = CurlController::api()."relations?rel=workers,users,subcategories&type=worker,user,subcategory&linkTo=url_worker,show_worker&equalTo=".$urlParams[0].",show&select=".$select;
    $method = "GET";
    $fields = array();
    $headers = array();
    $storeRes = CurlController::request($url,$method,$fields,$headers);
    $storeRes2 = $storeRes;

    if($storeRes->status == 200){
        $storeRes = $storeRes->result[0];
    }else{
        $storeRes = array();
    }

    // $select = "reviews_product";
    // $url = CurlController::api()."products?linkTo=id_store_product,approval_product,state_product&equalTo=".$storeRes->id_store.",approved,show&select=".$select;
    // $dataReview = CurlController::request($url,$method,$headers,$fields);
    $reviews = 0;
    $totalReviews = 0;
    $totalProductsStore = 0;
    $reviews=TemplateController::calificationStars(json_decode($storeRes->reviews_worker, true));
    $totalReviews= count(json_decode($storeRes->reviews_worker, true));
    // $totalProductsStore=$totalReviews;
    // if($storeRes->reviews_worker != null || $storeRes->reviews_worker != 0){
    //     $reviesWorker=json_decode($storeRes->reviews_worker, true);
    //     if(is_array($reviesWorker)){
    //         $totalProductsStore = count($reviesWorker);

    //         // foreach($reviesWorker as $index => $item){
    //         //     if($item != null){
    //         foreach($reviesWorker as $indx => $item2){
    //             $reviews += $item2["review"];
    //             $totalReviews++;
    //         }
    //             // }
    //         // }
    //         // if($reviews > 0 && $totalReviews >0){
    //         //     $reviews = round($reviews/$totalReviews);
    //         // }
    //     }
    // }

    /* Bring the best sales products */
    $select2 = "name_job,likes_job,image_job,url_job,url_category,summary_job,cover_job";
    $url2=CurlController::api()."relations?rel=jobs,categories&type=job,category&linkTo=id_worker_job,approval_job,state_job&equalTo=".$storeRes->id_worker.",approved,show&select=".$select2."&orderBy=views_job&orderMode=DESC";
    $bestSalesStore= CurlController::request($url2, $method, $field, $header);
    // echo '<pre>'; print_r($bestSalesStore); echo '</pre>'; 
    // return;
    if($bestSalesStore->status == 200){
        $totalProductsStore=$bestSalesStore->total;
        $bestSalesStore = $bestSalesStore->result;
    }else{
        $bestSalesStore = array();
    }

        /* valdate if there is pagination */
    if(isset($urlParams[1])){
        if(is_numeric($urlParams[1])){
            /* aqui se cambia la paginacion */
            $starAt= ($urlParams[1]*9) - 9;
        }else{
            echo '<script> 
                window.location= "'.$path.$urlParams[1].'"
            </script>';   
        }
    }else{
        $starAt=0;
    }

    /* validar que haya parametros de orden */
    if(isset($urlParams[2])){
        if(is_string($urlParams[2])){
            if($urlParams[2]=="new"){
                $orderBy="id_job";
                $orderMode="DESC";
            }
            else if($urlParams[2]=="latets"){
                $orderBy="id_job";
                $orderMode="ASC";
            }
            else if($urlParams[2]=="low"){
                $orderBy="price_job";
                $orderMode="ASC";
            }
            else if($urlParams[2]=="higt"){
                $orderBy="price_job";
                $orderMode="DESC";
            }else{
                echo '<script> 
                window.location= "'.$path.$urlParams[0].'";
            </script>';
            }
        }else{
            echo '<script> 
            window.location= "'.$path.$urlParams[0].'";
        </script>';
        }
    }else{
        $orderBy="id_job";
        $orderMode="DESC";
    }
    $endAt = 9;
    /* Bring all jobs */
    // $select3 = "name_product,reviews_product,price_product,offer_product,image_product,url_product,stock_product,url_category";
    $url3=CurlController::api()."relations?rel=jobs,categories&type=job,category&linkTo=id_worker_job,approval_job,state_job&equalTo=".$storeRes->id_worker.",approved,show&orderBy=" . $orderBy . "&orderMode=" . $orderMode . "&startAt=" . $starAt . "&endAt=".$endAt."&select=".$select2;
    $AllProductStore= CurlController::request($url3, $method, $field, $header);
    if($AllProductStore->status == 200){
        $AllProductStore = $AllProductStore->result;
    }else{
        $AllProductStore = array();
    }
?>
<!--=====================================
Breadcrumb
======================================-->  

    <div class="ps-breadcrumb">

        <div class="container">

            <ul class="breadcrumb">

                <li><a href="/">Home</a></li>

                <li><?php echo $storeRes->displayname_user; ?></li>

            </ul>

        </div>

    </div>

    <!--=====================================
    Vendor worker
    ======================================--> 
    <div class="container-fluid preloadTrue">
        <div class="ph-col-6">
            <div class="ph-item border-0">
                <div class="ph-col-2">
                    <div class="ph-picture" style="height:900px"></div>
                </div>
                <div class="ph-col-10">
                    <div class="ph-picture" style="height:400px"></div>
                    <div class="ph-item">
                        <div class="ph-col-12">
                            <div class="ph-picture"></div>
                        </div>

                        <div class="ph-col-12">
                            <div class="ph-row">
                                <div class="ph-col-12 "></div>
                                <div class="ph-col-8 "></div>
                                <div class="ph-col-4 empty"></div>
                                <div class="ph-col-4 "></div>
                                <div class="ph-col-8 empty"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ph-item">
                        <div class="ph-col-12">
                            <div class="ph-picture"></div>
                        </div>
                        <div class="ph-col-12">
                            <div class="ph-row">
                                <div class="ph-col-12 "></div>
                                <div class="ph-col-8 "></div>
                                <div class="ph-col-4 empty"></div>
                                <div class="ph-col-4 "></div>
                                <div class="ph-col-8 empty"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-vendor-store preloadFalse">
        <div class="container"> 
            <div class="ps-section__container">

                <!-- tienda -->
                <?php include "modules/workerView.php"; ?>

                <!-- Catalogo products -->
                <div class="ps-section__right">
                    <div class="ps-block--vendor-filter">
                        <div class="ps-block__left">
                            <ul>
                                <li class="active"><a>Trabajos</a></li>
                                <li><a >Reviews</a></li>
                                <li><a >About</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mas venddos -->
                    <?php //include "modules/moresales.php"; ?>

                    <div class="ps-shopping ps-tab-root">
                        
                        <?php include "modules/shopingHeader.php"; ?>
                        <!-- todos los productos -->
                        <?php include "modules/listJobs.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>