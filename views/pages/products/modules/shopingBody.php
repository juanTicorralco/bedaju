<?php
/* Bring the products of categories */
/* aqui tambien se cambai la paginacion */
$endAt = 24;
if($productRelation != "no found" ){
    $url4 = CurlController::api() . "relations?rel=products,categories,stores&type=product,category,store&linkTo=url_category,approval_product,state_product&equalTo=" . $urlParams[0] . ",approved,show&orderBy=" . $orderBy . "&orderMode=" . $orderMode . "&startAt=" . $starAt . "&endAt=".$endAt."&select=url_product,url_category,image_product,name_product,stock_product,offer_product,price_product,url_store,name_store,reviews_product,summary_product";
    $totalResultProducts = CurlController::request($url4, $method, $field, $header)->result;
            
    if ($totalResultProducts == "no found") {
        /* Bring the products of categories */
        $url4 = CurlController::api() . "relations?rel=products,categories,subcategories,stores&type=product,category,subcategory,store&linkTo=url_subcategory,approval_product,state_product&equalTo=" . $urlParams[0] . ",approved,show&orderBy=" . $orderBy . "&orderMode=" . $orderMode . "&startAt=" . $starAt . "&endAt=".$endAt."&select=url_product,url_category,image_product,name_product,stock_product,offer_product,price_product,url_store,name_store,reviews_product,summary_product";
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

                                            <a href="<?php echo $path . $value->url_product; ?>">
                                                <img src="img/products/<?php echo $value->url_category; ?>/<?php echo $value->image_product; ?>" alt="<?php echo $value->name_product; ?>">
                                            </a>

                                            <!-- precio -->
                                            <?php if ($value->stock_product != 0) : ?>
                                                <?php if ($value->offer_product != null) : ?>

                                                    <div class="ps-product__badge">-<?php echo TemplateController::percentOffer($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?>%</div>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <div class="ps-product__badge out-stock">Out Of Stock</div>
                                            <?php endif; ?>

                                            <?php
                                                if (in_array($value->url_product, $wishlist)) {
                                                    echo '  <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>';
                                                }
                                            ?>

                                            <div class="invisibleCorazon <?php echo $value->url_product; ?>">
                                            <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>
                                            </div>

                                            <ul class="ps-product__actions">

                                                <li>
                                                    <a  
                                                    class="btn" 
                                                    onclick="addBagCard('<?php echo $value->url_product; ?>', '<?php echo $value->url_category; ?>', '<?php echo $value->image_product; ?>', '<?php echo $value->name_product; ?>', '<?php echo $value->price_product; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                                                    detailSC 
                                                    quantitySC
                                                    data-toggle="tooltip" data-placement="top" title="Agregar al carrito">
                                                        <i class="icon-bag2"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="<?php echo $path . $value->url_product; ?>" data-toggle="tooltip" data-placement="top" title="Quick View">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a class="btn" onclick="addWishList('<?php echo $value->url_product; ?>', '<?php echo CurlController::api(); ?>')" data-toggle="tooltip" data-placement="top" title="Lo deseo">
                                                        <i class="icon-heart"></i>
                                                    </a>
                                                </li>

                                            </ul>

                                        </div>

                                        <div class="ps-product__container">

                                            <a class="ps-product__vendor" href="<?php echo $path . $value->url_store; ?>"><?php echo $value->name_store; ?></a>

                                            <div class="ps-product__content">

                                                <a class="ps-product__title" href="<?php echo $path . $value->url_product; ?>">
                                                    <?php echo $value->name_product; ?></a>

                                                <div class="ps-product__rating">
                                                    <?php $reviews = TemplateController::calificationStars(json_decode($value->reviews_product, true)); ?>

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
                                                            if ($value->reviews_product != null) {
                                                                echo count(json_decode($value->reviews_product, true));
                                                            } else {
                                                                echo "0";
                                                            }
                                                            ?>)
                                                    </span>
                                                </div>

                                                <?php if ($value->offer_product != null) : ?>
                                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?> <del>$<?php echo $value->price_product; ?></del></p>
                                                <?php else : ?>
                                                    <p class="ps-product__price">$<?php echo $value->price_product; ?></p>
                                                <?php endif; ?>

                                            </div>

                                            <div class="ps-product__content hover">

                                                <a class="ps-product__title" href="<?php echo $path . $value->url_product; ?>">
                                                    <?php echo $value->name_product; ?></a>

                                                <?php if ($value->offer_product != null) : ?>
                                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?> <del>$<?php echo $value->price_product; ?></del></p>
                                                <?php else : ?>
                                                    <p class="ps-product__price">$<?php echo $value->price_product; ?></p>
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

                    <ul class="pagination" data-total-page="<?php echo ceil($totalProductes / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>">
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

                                                <a href="<?php echo $path . $value->url_product; ?>">
                                                    <img src="img/products/<?php echo $value->url_category; ?>/<?php echo $value->image_product; ?>" alt="<?php echo $value->name_product; ?>">
                                                </a>

                                                <?php if ($value->stock_product != 0) : ?>
                                                    <?php if ($value->offer_product != null) : ?>

                                                        <div class="ps-product__badge">-<?php echo TemplateController::percentOffer($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?>%</div>
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <div class="ps-product__badge out-stock">Out Of Stock</div>
                                                <?php endif; ?>

                                                <?php
                                                if (in_array($value->url_product, $wishlist)) {
                                                    echo '  <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>';
                                                }
                                                ?>

                                                    <div class="invisibleCorazon <?php echo $value->url_product; ?>">
                                                    <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>
                                                    </div>


                                            </div>

                                            <div class="ps-product__container">

                                                <div class="ps-product__content">

                                                    <a class="ps-product__title" href="<?php echo $path . $value->url_product; ?>">
                                                        <?php echo $value->name_product; ?></a>

                                                    <p class="ps-product__vendor">Sold by:
                                                        <a href="<?php echo $path . $value->url_store; ?>"><?php echo $value->name_store; ?></a>
                                                    </p>

                                                    <div class="ps-product__rating">

                                                        <?php $reviews = TemplateController::calificationStars(json_decode($value->reviews_product, true)); ?>

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
                                                                if ($value->reviews_product != null) {
                                                                    echo count(json_decode($value->reviews_product, true));
                                                                } else {
                                                                    echo "0";
                                                                }
                                                                ?> review)
                                                        </span>


                                                    </div>

                                                    <ul class="ps-product__desc">
                                                        <?php foreach (json_decode($value->summary_product) as $key2 => $value2) : ?>
                                                            <li> <?php echo $value2; ?> </li>
                                                        <?php endforeach; ?>
                                                    </ul>

                                                </div>

                                                <div class="ps-product__shopping">

                                                    <?php if ($value->offer_product != null) : ?>
                                                        <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_product, json_decode($value->offer_product, true)[1], json_decode($value->offer_product, true)[0]); ?> <del>$<?php echo $value->price_product; ?></del></p>
                                                    <?php else : ?>
                                                        <p class="ps-product__price">$<?php echo $value->price_product; ?></p>
                                                    <?php endif; ?>

                                                    <a class="ps-btn" 
                                                    class="btn" 
                                                    onclick="addBagCard('<?php echo $value->url_product; ?>', '<?php echo $value->url_category; ?>', '<?php echo $value->image_product; ?>', '<?php echo $value->name_product; ?>', '<?php echo $value->price_product; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                                                    detailSC 
                                                    quantitySC
                                                    >Add to cart</a>

                                                    <ul class="ps-product__actions">
                                                        <li><a href="<?php echo $path . $value->url_product; ?>"><i class="icon-eye"></i>View</a></li>
                                                        <li>
                                                        <a class="btn" onclick="addWishList('<?php echo $value->url_product; ?>', '<?php echo CurlController::api(); ?>')" >
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

                                <ul class="pagination" data-total-page="<?php echo ceil($totalProductes / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                                </ul>

                            </div>
                        </div>

                    </div>