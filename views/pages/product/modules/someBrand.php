<?php
$url11 = CurlController::api() . "relations?rel=jobs,workers,users,categories&type=job,worker,user,category&linkTo=id_worker_job&equalTo=" . $workerter->id_worker . "&orderBy=id_job&orderMode=DESC&startAt=0&endAt=3&select=url_category,picture_user,price_worker,url_job,image_job,name_job,url_worker,displayname_user,likes_job,id_user,username_user,likes_job,id_job";
$method11 = "GET";
$field11 = array();
$header11 = array();
$storeProduct = CurlController::request($url11, $method11, $field11, $header11)->result;
?>

<aside class="widget widget_same-brand">
    <h3>Otros trabajos</h3>
    <div class="container-fluid preloadTrue">
        <div class="ph-item border-0 p-0 mt-0">
            <div class="ph-col-6">
                <div class="ph-picture" style="height:50px"></div>
            </div>
            <div class="ph-col-6">
                <div class="ph-row">
                    <div class="ph-col-8"></div>
                    <div class="ph-col-4 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div>
        <div class="ph-item border-0 p-0 mt-0">
            <div class="ph-col-6">
                <div class="ph-picture" style="height:50px"></div>
            </div>
            <div class="ph-col-6">
                <div class="ph-row">
                    <div class="ph-col-8"></div>
                    <div class="ph-col-4 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div>
        <div class="ph-item border-0 p-0 mt-0">
            <div class="ph-col-6">
                <div class="ph-picture" style="height:50px"></div>
            </div>
            <div class="ph-col-6">
                <div class="ph-row">
                    <div class="ph-col-8"></div>
                    <div class="ph-col-4 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div>
        <div class="ph-item border-0 p-0 mt-0">
            <div class="ph-col-6">
                <div class="ph-picture" style="height:50px"></div>
            </div>
            <div class="ph-col-6">
                <div class="ph-row">
                    <div class="ph-col-8"></div>
                    <div class="ph-col-4 empty"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-12"></div>
                    <div class="ph-col-6"></div>
                    <div class="ph-col-6 empty"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget__content preloadFalse m-0">
        <?php foreach ($storeProduct as $key => $value) : ?>
            <div class="ps-product">
                <div class="ps-product__thumbnail">
                    <a href="<?php echo $path . $value->url_job; ?>">
                        <img class="rounded-pill" src="img/users/<?php echo $value->id_user; ?>-<?php echo $value->username_user; ?>/jobs/<?php echo $value->image_job; ?>" alt="<?php echo $value->name_job ?>">
                    </a>
                    <!-- porcentaje -->
                    <?php //if ($value->stock_product != 0) : ?>
                        <?php //if ($value->offer_product != null) : ?>
                            <!-- <div class="ps-product__badge">-<?php //echo TemplateController::percentOffer($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?>%</div> -->
                        <?php //endif; ?>
                    <?php //else : ?>
                        <!-- <div class="ps-product__badge out-stock">Out Of Stock</div> -->
                    <?php //endif; ?>
                    <?php
                        if (in_array($value->url_job, $wishlist)) {
                            echo '  <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>';
                        }
                    ?>
                    <div class="invisibleCorazon <?php echo $value->url_job; ?>">
                        <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>
                    </div>
                    <ul class="ps-product__actions rounded-pill">
                        <li>
                            <a
                            class="btn" 
                            onclick="addBagCard('<?php echo $value->url_worker; ?>', '<?php echo $value->url_category; ?>', '<?php echo $value->picture_user; ?>', '<?php echo $value->displayname_user; ?>', '<?php echo $value->price_worker; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                            detailSC 
                            quantitySC
                            data-toggle="tooltip" data-placement="top" title="Agregar al carrito">
                                <i class="icon-bag2"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Quick View">
                                <i class="icon-eye"></i>
                            </a>
                        </li>
                        <li>
                        <a class="btn" onclick="addWishList('<?php echo $value->url_worker; ?>', '<?php echo CurlController::api(); ?>')" data-toggle="tooltip" data-placement="top" title="Lo deseo">
                            <i class="icon-heart"></i>
                        </a>
                        </li>
                    </ul>
                </div>
                <div class="ps-product__container">
                    <a class="ps-product__vendor" href="<?php echo $path . $value->url_worker; ?>"><?php echo $value->displayname_user; ?></a>
                    <div class="ps-product__content">
                        <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>"><?php echo $value->name_job; ?></a>
                        <div class="ps-product__rating">
                            <!-- <select class="ps-rating" data-read-only="true"> -->
                                <!-- reseñas en estrellas -->
                                <?php //$reviews = TemplateController::calificationStars(json_decode($value->reviews_product, true)); ?>
                                <?php
                                    // if ($reviews > 0) {
                                    //     for ($i = 0; $i < 5; $i++) {
                                    //         if ($reviews < ($i + 1)) {
                                    //             echo '<option value="1">' . $i + 1 . '</option>';
                                    //         } else {
                                    //             echo '<option value="2">' . $i + 1 . '</option>';
                                    //         }
                                    //     }
                                    // } else {
                                    //     echo '<option value="0">0</option>';
                                    //     for ($i = 0; $i < 5; $i++) {
                                    //         echo '<option value="1">' . $i + 1 . '</option>';
                                    //     }
                                    // }
                                ?>
                            <!-- </select> -->
                            <!-- numero de reviciones -->
                            <!-- <span>( -->
                                <?php
                                    // if ($producter->reviews_product != null) {
                                    //     echo count(json_decode($producter->reviews_product, true));
                                    // } else {
                                    //     echo "0";
                                    // }
                                    ?> 
                            <!-- reseñas)</span> -->
                        </div>
                        <!-- precio  -->
                        <?php //if ($value->offer_product != null) : ?>
                            <!-- <h2 class="ps-product__price sale text-success">$<?php //echo TemplateController::offerPrice($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?> <del>$<?php //echo $value->price_product; ?></del></h2> -->
                        <?php //else : ?>
                            <!-- <p class="ps-product__price">$<?php //echo $value->price_product; ?></p> -->
                        <?php //endif; ?>
                    </div>
                    <div class="ps-product__content hover">
                        <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>"><?php echo $value->name_job; ?></a>
                        <!-- precio  -->
                        <?php //if ($value->offer_product != null) : ?>
                            <!-- <h2 class="ps-product__price sale text-success">$<?php //echo TemplateController::offerPrice($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?> <del>$<?php //echo $value->price_product; ?></del></h2> -->
                        <?php //else : ?>
                            <!-- <p class="ps-product__price">$<?php //echo $value->price_product; ?></p> -->
                        <?php //endif; ?>
                    </div>
                    <?php 
                        $url11 = CurlController::api() . "relations?rel=comments,jobs&type=comment,job&linkTo=id_job_comment&equalTo=" . $value->id_job . "&select=id_comment";
                        $method11 = "GET";
                        $field11 = array();
                        $header11 = array();
                        $commentJosb = CurlController::request($url11, $method11, $field11, $header11);
                        if($commentJosb->status==200){
                            if($commentJosb->total >0){
                                $commentJosb = $commentJosb->total;
                            }else{
                                $commentJosb=0;
                            }
                        }else{
                            $commentJosb=0;
                        }
                    ?>
                    <button class="btn m-3 bg-white border border-primary text-primary rounded-pill p-3 "><i class="fas fa-thumbs-up"></i> <strong><?php echo $value->likes_job; ?></strong></button>
                    <button class="btn bg-primary border text-white rounded-pill border-primary shadow-none p-3 "><i class="fas fa-comment"></i> <strong><?php echo $commentJosb; ?></strong></button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</aside>