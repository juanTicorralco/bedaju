<?php
/* Bring the products of categories */
/* aqui tambien se cambai la paginacion */
$endAt = 24;
if($jobRelation != "no found" ){
    $url4 = CurlController::api() . "relations?rel=jobs,categories,workers&type=job,category,worker&linkTo=url_category,approval_job,state_job&equalTo=" . $urlParams[0] . ",approved,show&orderBy=" . $orderBy . "&orderMode=" . $orderMode . "&startAt=" . $starAt . "&endAt=".$endAt."&select=url_job,url_category,image_job,name_job,stock_job,offer_job,price_job,url_worker,reviews_job,summary_job";
    $totalResultProducts = CurlController::request($url4, $method, $field, $header)->result;
            
    if ($totalResultProducts == "no found") {
        /* Bring the products of categories */
        $url4 = CurlController::api() . "relations?rel=jobs,categories,subcategories,workers&type=job,category,subcategory,worker&linkTo=url_subcategory,approval_job,state_job&equalTo=" . $urlParams[0] . ",approved,show&orderBy=" . $orderBy . "&orderMode=" . $orderMode . "&startAt=" . $starAt . "&endAt=".$endAt."&select=url_job,url_category,image_job,name_job,stock_job,offer_job,price_job,url_worker,reviews_job,summary_job";
        $totalResultProducts = CurlController::request($url4, $method, $field, $header)->result;
    }
}
?>
<div class="ps-tabs">

    <!--=====================================
    Grid View
    ======================================-->

    <!-- checkar si hay una cookie -->
    <?php if (isset($_COOKIE["tab"])) : ?>
        <?php if ($_COOKIE["tab"] == "grid" || $_COOKIE["tab"] == "undefined") : ?>
            <div class="ps-tab active" id="tab-1">
        <?php else : ?>
                <div class="ps-tab" id="tab-1">
        <?php endif; ?>
    <?php else : ?>
                <div class="ps-tab active" id="tab-1">
    <?php endif; ?>

                <div class="ps-shopping-product">

                    <div class="row">

                        <!--=====================================
                        Product
                        ======================================-->

                        <?php if(isset($totalResultProducts) && $totalResultProducts != null && $totalResultProducts != "no found"  ) :  ?>
                            <div class="container-fluid preloadTrue">
                                <div class="row">
                                    <div class="clo-xl-2 col-lg-3 clo-sm-4 col-6">
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
                                    <div class="clo-xl-2 col-lg-3 clo-sm-4 col-6">
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
                                    <div class="clo-xl-2 col-lg-3 clo-sm-4 col-6">
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
                                    <div class="clo-xl-2 col-lg-3 clo-sm-4 col-6">
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

                            <?php foreach ($totalResultProducts as $key => $value) : ?>
                                <div class="col-lg-2 col-md-4 col-6  preloadFalse">

                                    <div class="ps-product">

                                        <div class="ps-product__thumbnail">

                                            <a href="<?php echo $path . $value->url_job; ?>">
                                                <img src="img/products/<?php echo $value->url_category; ?>/<?php echo $value->image_job; ?>" alt="<?php echo $value->name_job; ?>">
                                            </a>

                                            <!-- precio -->
                                            <?php if ($value->stock_job != 0) : ?>
                                                <?php if ($value->offer_job != null) : ?>

                                                    <div class="ps-product__badge">-<?php echo TemplateController::percentOffer($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?>%</div>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <div class="ps-product__badge out-stock">Out Of Stock</div>
                                            <?php endif; ?>

                                            <?php
                                                if (in_array($value->url_job, $wishlist)) {
                                                    echo '  <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>';
                                                }
                                            ?>

                                            <div class="invisibleCorazon <?php echo $value->url_job; ?>">
                                            <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>
                                            </div>

                                            <ul class="ps-product__actions">

                                                <li>
                                                    <a  
                                                    class="btn" 
                                                    onclick="addBagCard('<?php echo $value->url_job; ?>', '<?php echo $value->url_category; ?>', '<?php echo $value->image_job; ?>', '<?php echo $value->name_job; ?>', '<?php echo $value->price_job; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                                                    detailSC 
                                                    quantitySC
                                                    data-toggle="tooltip" data-placement="top" title="Agregar al carrito">
                                                        <i class="icon-bag2"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="<?php echo $path . $value->url_job; ?>" data-toggle="tooltip" data-placement="top" title="Quick View">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="btn" onclick="addWishList('<?php echo $value->url_job; ?>', '<?php echo CurlController::api(); ?>')" data-toggle="tooltip" data-placement="top" title="Lo deseo">
                                                        <i class="icon-heart"></i>
                                                    </a>
                                                </li>

                                            </ul>

                                        </div>

                                        <div class="ps-product__container">

                                            <a class="ps-product__vendor" href="<?php echo $path . $value->url_worker; ?>"><?php echo $value->url_worker; ?></a>

                                            <div class="ps-product__content">

                                                <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>">
                                                    <?php echo $value->name_job; ?></a>

                                                <div class="ps-product__rating">
                                                    <?php $reviews = TemplateController::calificationStars(json_decode($value->reviews_job, true)); ?>

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

                                                    <span>
                                                        (<?php
                                                            if ($value->reviews_job != null) {
                                                                echo count(json_decode($value->reviews_job, true));
                                                            } else {
                                                                echo "0";
                                                            }
                                                            ?>)
                                                    </span>
                                                </div>

                                                <?php if ($value->offer_job != null) : ?>
                                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php echo $value->price_job; ?></del></p>
                                                <?php else : ?>
                                                    <p class="ps-product__price">$<?php echo $value->price_job; ?></p>
                                                <?php endif; ?>

                                            </div>

                                            <div class="ps-product__content hover">

                                                <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>">
                                                    <?php echo $value->name_job; ?></a>

                                                <?php if ($value->offer_job != null) : ?>
                                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php echo $value->price_job; ?></del></p>
                                                <?php else : ?>
                                                    <p class="ps-product__price">$<?php echo $value->price_job; ?></p>
                                                <?php endif; ?>

                                            </div>

                                        </div>

                                    </div>

                                </div><!-- End Product -->
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h4>No hay Productos</h4>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="ps-pagination">
                    <?php if (isset($urlParams[1])) {
                        $CurrentPage = $urlParams[1];
                    } else {
                        $CurrentPage = 1;
                    } ?>

                    <ul class="pagination" data-total-page="<?php echo ceil($totaljobes / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                    </ul>

                </div>

                </div><!-- End Grid View-->

                <!--=====================================
                List View
                ======================================-->

                <!-- checkar si hay una cookie -->
                <?php if (isset($_COOKIE["tab"])) : ?>
                    <?php if ($_COOKIE["tab"] == "list") : ?>
                        <div class="ps-tab active" id="tab-2">
                        <?php else : ?>
                            <div class="ps-tab" id="tab-2">
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="ps-tab" id="tab-2">
                            <?php endif; ?>

                            <div class="ps-shopping-product">

                                <!--=====================================
                                Product
                                ======================================-->
                                <?php if(isset($totalResultProducts) && $totalResultProducts != null && $totalResultProducts != "no found"  ) :  ?>
                                    <?php foreach ($totalResultProducts as $key => $value) : ?>
                                        <div class="ps-product ps-product--wide">

                                            <div class="ps-product__thumbnail">

                                                <a href="<?php echo $path . $value->url_job; ?>">
                                                    <img src="img/products/<?php echo $value->url_category; ?>/<?php echo $value->image_job; ?>" alt="<?php echo $value->name_job; ?>">
                                                </a>

                                                <?php if ($value->stock_job != 0) : ?>
                                                    <?php if ($value->offer_job != null) : ?>

                                                        <div class="ps-product__badge">-<?php echo TemplateController::percentOffer($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?>%</div>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <div class="ps-product__badge out-stock">Out Of Stock</div>
                                                <?php endif; ?>

                                                <?php
                                                if (in_array($value->url_job, $wishlist)) {
                                                    echo '  <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>';
                                                }
                                                ?>

                                                    <div class="invisibleCorazon <?php echo $value->url_job; ?>">
                                                    <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>
                                                    </div>


                                            </div>

                                            <div class="ps-product__container">

                                                <div class="ps-product__content">

                                                    <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>">
                                                        <?php echo $value->name_job; ?></a>

                                                    <p class="ps-product__vendor">Sold by:
                                                        <a href="<?php echo $path . $value->url_worker; ?>"><?php echo $value->url_worker; ?></a>
                                                    </p>

                                                    <div class="ps-product__rating">

                                                        <?php $reviews = TemplateController::calificationStars(json_decode($value->reviews_job, true)); ?>

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

                                                        <span>
                                                            (<?php
                                                                if ($value->reviews_job != null) {
                                                                    echo count(json_decode($value->reviews_job, true));
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?> review)
                                                        </span>


                                                    </div>

                                                    <ul class="ps-product__desc">
                                                        <?php foreach (json_decode($value->summary_job) as $key2 => $value2) : ?>
                                                            <li> <?php echo $value2; ?> </li>
                                                        <?php endforeach; ?>
                                                    </ul>

                                                </div>

                                                <div class="ps-product__shopping">

                                                    <?php if ($value->offer_job != null) : ?>
                                                        <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php echo $value->price_job; ?></del></p>
                                                    <?php else : ?>
                                                        <p class="ps-product__price">$<?php echo $value->price_job; ?></p>
                                                    <?php endif; ?>

                                                    <a class="ps-btn" 
                                                    class="btn" 
                                                    onclick="addBagCard('<?php echo $value->url_job; ?>', '<?php echo $value->url_category; ?>', '<?php echo $value->image_job; ?>', '<?php echo $value->name_job; ?>', '<?php echo $value->price_job; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                                                    detailSC 
                                                    quantitySC
                                                    >Add to cart</a>

                                                    <ul class="ps-product__actions">
                                                        <li><a href="<?php echo $path . $value->url_job; ?>"><i class="icon-eye"></i>View</a></li>
                                                        <li>
                                                        <a class="btn" onclick="addWishList('<?php echo $value->url_job; ?>', '<?php echo CurlController::api(); ?>')" >
                                                        <strong> <i class="icon-heart"></i> Wishlist</a> </strong>
                                                        </li>
                                                    </ul>

                                                </div>

                                            </div>

                                        </div> <!-- End Product -->
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <h4>No hay Productos</h4>
                                <?php endif; ?>

                            </div>

                            <div class="ps-pagination">
                                <?php if (isset($urlParams[1])) {
                                    $CurrentPage = $urlParams[1];
                                } else {
                                    $CurrentPage = 1;
                                } ?>

                                <ul class="pagination" data-total-page="<?php echo ceil($totaljobes / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                </ul>

                            </div>
                        </div>

                    </div>