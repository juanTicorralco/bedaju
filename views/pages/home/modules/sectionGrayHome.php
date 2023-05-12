<?php
$url = CurlController::api() . "categories?orderBy=views_category&orderMode=DESC&startAt=0&endAt=5&select=name_category,id_category,url_category";
$method = "GET";
$field = array();
$header = array();

$bestcategory = CurlController::request($url, $method, $field, $header)->result;
?>

<div class="container-fluid preloadTrue">
    <div class="ph-item">
        <div class="ph-col-2">
            <div class="ph-row">
                <div class="ph-col-12 big"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-8"></div>
                <div class="ph-col-4 empty"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-12"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-12"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-12"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-12"></div>
                <div class="ph-col-12 empty"></div>
                <div class="ph-col-12"></div>
            </div>
        </div>
        <div class="ph-col-2">
        <div class="ph-picture" style="height:500px"></div>
        </div>
        <div class="ph-col-8">
        <div class="ph-picture" style="height:500px"></div>
        </div>
    </div>
</div>

<div class="ps-section--gray preloadFalse">

    <div class="container">

        <!--=====================================
        Products of category
        ======================================-->

        <?php foreach ($bestcategory as $key => $value) : ?>
            <div class="ps-block--products-of-category">

                <!--=====================================
                Menu subcategory
                ======================================-->

                <div class="ps-block__categories">

                    <h3><?php echo $value->name_category; ?></h3>

                    <ul class="mb-5">

                        <?php
                        $url = CurlController::api() . "subcategories?linkTo=id_category_subcategory,show_subcategory&equalTo=" . $value->id_category . ",show&select=url_subcategory,name_subcategory";
                        

                        $subcategoryAll = CurlController::request($url, $method, $field, $header)->result;

                        foreach ($subcategoryAll as $key2 => $value2) :?>
                            <li><a href="<?php echo $path . $value2->url_subcategory; ?>"><?php echo $value2->name_subcategory; ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <a class="ps-block__more-link" href="<?php echo $path . $value->url_category; ?>">Ver todo</a>

                </div>

                <!--=====================================
                Vertical Slider Category
                ======================================-->
                <?php
                $url = CurlController::api()."relations?rel=promotions,workers&type=promotion,worker&linkTo=id_category_promotion,show_promotion&equalTo=" . $value->id_category . ",show&select=id_worker";
                $totalPromotion = CurlController::request($url, $method, $field, $header)->total;
                if($totalPromotion>5){
                    $aleatorPromotion = rand(0, ($totalpromotions - 5));
                }else{
                    $aleatorPromotion= 0;
                }

                $url = CurlController::api()."relations?rel=promotions,workers&type=promotion,worker&linkTo=id_category_promotion,show_promotion&equalTo=" . $value->id_category . ",show&orderBy=views_worker&orderMode=DESC&startAt=$aleatorPromotion&endAt=6&select=vertical_slider_promotion,id_worker,url_worker,show_worker";
                $bestProduct = CurlController::request($url, $method, $field, $header)->result;

                $url = CurlController::api()."relations?rel=workers,users,subcategories&type=worker,user,subcategory&linkTo=id_category_worker,show_worker&equalTo=" . $value->id_category . ",show&orderBy=views_worker&orderMode=DESC&startAt=0&endAt=6&select=id_worker,id_user,name_subcategory,picture_user,url_worker,show_worker,displayname_user,username_user,reviews_worker,price_worker,country_worker,city_worker,address_worker";
                $method = "GET";
                $field = array();
                $header = array();

                $bestProduct2 = CurlController::request($url, $method, $field, $header)->result;


                ?>
                <?php if(is_array($bestProduct)): ?>
                <?php if(count($bestProduct)>1): ?>
                <div class="ps-block__slider">

                    <div class="ps-carousel--product-box owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off">

                        <?php foreach ($bestProduct as $key3 => $value3) : ?>
                            <a href="<?php echo $path . $value3->url_worker; ?>">
                                <img src="img/promotions/<?php echo $value3->id_worker; ?>-<?php echo $value3->url_worker; ?>/vertical/<?php echo $value3->vertical_slider_promotion; ?>" alt="<?php echo $value3->url_worker; ?>">
                            </a>
                        <?php endforeach; ?>

                    </div>

                </div>
                <?php endif; ?>
                <?php endif; ?>

                <!--=====================================
                Block Product Box
                ======================================-->

                <div class="ps-block__product-box">

                    <!--=====================================
                    Product Simple
                    ======================================-->
                    <?php foreach ($bestProduct2 as $key3 => $value3) : ?>
                        <div class="ps-product ps-product--simple">
                            <div class="ps-product__thumbnail">
                                <a href="<?php echo $path . $value3->url_worker; ?>">
                                    <img class="rounded-circle" src="img/users/<?php echo $value3->id_user; ?>-<?php echo $value3->username_user; ?>/<?php echo $value3->picture_user; ?>" alt="<?php echo $value3->url_worker; ?>">
                                </a>

                                <?php if ($value3->show_worker == "show") : ?>
                                    <?php //if ($value3->offer_product != null) : ?>

                                        <div class="ps-product__badge">Disponible</div>
                                    <?php //endif; ?>
                                <?php else : ?>
                                    <div class="ps-product__badge out-stock">No disponible</div>
                                <?php endif; ?>

                            </div>

                            <div class="ps-product__container">

                                <div class="ps-product__content" data-mh="clothing">

                                    <a class="ps-product__title font-weight-bold" href="<?php echo $path . $value3->url_worker; ?>"><?php echo $value3->displayname_user; ?></a>
                                    <small class="font-weight-bold"><?php echo $value3->name_subcategory; ?></small>
                                    <div class="ps-product__rating">

                                        <?php $reviews = TemplateController::calificationStars(json_decode($value3->reviews_worker, true));
                                        ?>

                                        <select class="ps-rating" data-read-only="true">

                                            <?php
                                            if ($reviews > 0) {
                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($reviews < ($i + 1)) {
                                                        echo '<option value="1">' . $i + 1 . '</option>';
                                                    } else {
                                                        echo '<option value="2">' . $i + 1 . '</option>';
                                                    }
                                                }
                                            } else {
                                                echo '<option value="0">0</option>';
                                                for ($i = 0; $i < 5; $i++) {
                                                    echo '<option value="1">' . $i + 1 . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>

                                        <span>(<?php
                                                if ($value3->reviews_worker != null) {
                                                    echo count(json_decode($value3->reviews_worker, true));
                                                } else {
                                                    echo "0";
                                                }
                                                ?> reseñas)
                                        </span>
                                    </div>
                                    <?php //if ($value3->offer_product != null) : ?>
                                        <!-- <p class="ps-product__price sale">$<?php //echo TemplateController::offerPrice($value3->price_product, json_decode($value3->offer_product, true)[1], json_decode($value3->offer_product, true)[0]); ?> <del>$<?php echo $value3->price_product; ?></del></p> -->
                                    <?php //else : ?>
                                        <!-- <p class="ps-product__price">$<?php //echo $value3->price_product; ?></p> -->
                                    <?php //endif; ?>
                                    <!-- <p class="ps-product__price">Cotizaciones - <span class="text-success">$<?php //echo $value3->price_worker; ?></span></p> -->
                                    <small><?php echo $value3->country_worker." | ".$value3->city_worker; ?></small>
                                </div>

                            </div>

                        </div> <!-- End Product Simple -->
                    <?php endforeach; ?>

                </div><!-- End Block Product Box -->

            </div><!-- End Products of category -->
        <?php endforeach; ?>

    </div><!-- End Container-->

</div><!-- End Section Gray-->