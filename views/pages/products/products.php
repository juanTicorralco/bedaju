<?php 
    /* valdate if there is pagination */
    if(isset($urlParams[1])){
        if(is_numeric($urlParams[1])){
            /* aqui se cambia la paginacion */
            $starAt= ($urlParams[1]*24) - 24;
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

    /* Bring the jobs of categories */
    $url=CurlController::api()."relations?rel=workers,categories&type=worker,category&linkTo=url_category,show_worker&equalTo=".$urlParams[0].",show&orderBy=id_category&startAt=0&endAt=7&select=views_category,id_category,name_category";
    $method="GET";
    $field=array();
    $header=array();

    $jobRelation= CurlController::request($url, $method, $field, $header)->result;

    if( $jobRelation =="no found"){
        /* Bring the jobs of subcategories */
        $url=CurlController::api()."relations?rel=jobs,subcategories,worker&type=job,subcategory,store&linkTo=url_subcategory,approval_job,state_job&equalTo=".$urlParams[0].",approved,show&orderBy=id_category&startAt=0&endAt=7&select=views_subcategory,id_subcategory,name_subcategory";
        $jobRelation= CurlController::request($url, $method, $field, $header)->result;

        if( $jobRelation != "no found"){

        /* Bring all subcategories */
        $url2=CurlController::api()."relations?rel=jobs,subcategories,worker&type=job,subcategory,store&linkTo=url_subcategory,approval_job,state_job&equalTo=".$urlParams[0].",approved,show&select=id_subcategory";
        $totalProduc = CurlController::request($url2, $method, $field, $header);
        if($totalProduc->status == 200){
            $totaljobes = $totalProduc->total;
        }else{
            $totaljobes = 0;
        }

         /* actualizar las vistas de subcategorias */
         $views= $jobRelation[0]->views_subcategory+1;

         $url123= CurlController::api()."subcategories?id=".$jobRelation[0]->id_subcategory."&nameId=id_subcategory&token=no&except=views_subcategory";
         $method123= "PUT";
         $field123= "views_subcategory=".$views;
         $header123=array();
 
         $upDateSubCategory= CurlController::request($url123,$method123,$field123, $header123); 
        }
    }else{
        /* Bring all categories */
        $url2=CurlController::api()."relations?rel=categories,worker&type=category,worker&linkTo=url_category,show_worker&equalTo=".$urlParams[0].",show&select=id_category";
        $totalProduc = CurlController::request($url, $method, $field, $header);

        if($totalProduc->status == 200){
            $totaljobes = $totalProduc->total;
        }else{
            $totaljobes = 0;
        }

      /* actualizar las vistas de categorias */
        $views= $jobRelation[0]->views_category+1;

        $url123= CurlController::api()."categories?id=".$jobRelation[0]->id_category."&nameId=id_category&token=no&except=views_category";
        $method123= "PUT";
        $field123= "views_category=".$views;
        $header123=array();

        $upDateCategory= CurlController::request($url123,$method123,$field123, $header123); 
    }

    /* Bring the best sales of categories */
    $url2=CurlController::api()."relations?rel=workers,users,categories,subcategories&type=worker,user,category,subcategory&linkTo=url_category,show_worker&equalTo=".$urlParams[0].",show&orderBy=hired_worker&orderMode=DESC&startAt=0&endAt=7&select=url_worker,url_category,picture_user,displayname_user,show_worker,price_worker,reviews_worker,id_user,username_user,name_subcategory,country_worker,city_worker";
    $bestSalesItem= CurlController::request($url2, $method, $field, $header)->result;

    if( $bestSalesItem =="no found"){
        /* Bring the jobs of subcategories */
        $url2=CurlController::api()."relations?rel=jobs,categories,subcategories,worker&type=job,category,subcategory,store&linkTo=url_subcategory,approval_job,state_job&equalTo=".$urlParams[0].",approved,show&orderBy=sales_job&orderMode=DESC&startAt=0&endAt=7&select=url_job,url_category,image_job,name_job,stock_job,offer_job,price_job,url_store,name_store,reviews_job";
        $bestSalesItem= CurlController::request($url2, $method, $field, $header)->result;
    }

    /* Bring the best sales of categories */
    $url3=CurlController::api()."relations?rel=workers,users,categories,subcategories&type=worker,user,category,subcategory&linkTo=url_category,show_worker&equalTo=".$urlParams[0].",show&orderBy=views_worker&orderMode=DESC&startAt=0&endAt=7&select=url_worker,url_category,picture_user,displayname_user,show_worker,price_worker,reviews_worker,id_user,username_user,name_subcategory,country_worker,city_worker";
    $moreViewsItem= CurlController::request($url3, $method, $field, $header)->result;

    if( $moreViewsItem =="no found"){
        /* Bring the jobs of subcategories */
        $url3=CurlController::api()."relations?rel=jobs,categories,subcategories,worker&type=job,category,subcategory,store&linkTo=url_subcategory,approval_job,state_job&equalTo=".$urlParams[0].",approved,show&orderBy=views_job&orderMode=DESC&startAt=0&endAt=7&select=url_job,url_category,image_job,name_job,stock_job,offer_job,price_job,url_store,name_store,reviews_job";
        $moreViewsItem= CurlController::request($url3, $method, $field, $header)->result;
    }
    // echo "<pre>"; print_r($moreViewsItem); echo "</pre>";
    // return;
?>

<!--=====================================
Breadcrumb
======================================-->  

<?php include "modules/breadCrumb.php"; ?>

<!--=====================================
Categories Content
======================================--> 

<div class="container-fuid bg-white my-4">

    <div class="container">

        <!--=====================================
        Layout Categories
        ======================================--> 

        <div class="ps-layout--shop">
        
            <section>

                <!--=====================================
                Best Sale Items
                ======================================--> 

                <?php include "modules/bestSales.php"; ?>

                <!--=====================================
                Recommended Items
                ======================================--> 

               <?php include "modules/recomended.php"; ?>

                <!--=====================================
                jobs found
                ======================================--> 

                <div id="showCase" class="ps-shopping ps-tab-root">

                    <!--=====================================
                    Shoping Header
                    ======================================--> 

                    <?php include "modules/shopingHeader.php"; ?>

                    <!--=====================================
                    Shoping Body
                    ======================================--> 

                    <?php include "modules/shopingBody.php"; ?>

                </div>

            </section>

        </div><!-- End Layout Categories -->

    </div><!-- End Container -->

</div><!-- End Container Fluid -->