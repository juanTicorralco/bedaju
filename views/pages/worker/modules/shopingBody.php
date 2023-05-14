<?php if($totalProductsStore > 0): ?>
    <div class="ps-tabs">
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
            <div class="row">
                <?php if($AllProductStore > 0): ?>
                    <?php foreach($AllProductStore as $key => $value):?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="<?php echo $path . $value->url_job; ?>"><img src="img/jobs/<?php echo $value->url_category; ?>/<?php echo $value->image_job; ?>" alt="<?php echo $value->name_job; ?>"></a>
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
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                    <div class="ps-product__content">
                                    <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>"><?php echo $value->name_job; ?></a>
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
                                    <a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>"><?php echo $value->name_job; ?></a>
                                    <?php if ($value->offer_job != null) : ?>
                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php echo $value->price_job; ?></del></p>
                                <?php else : ?>
                                    <p class="ps-product__price">$<?php echo $value->price_job; ?></p>
                                <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                <ul class="pagination" data-total-page="<?php echo ceil($totalProductsStore / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>"></ul>
            </div>
        </div>
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
            <?php if($AllProductStore > 0 ) :  ?>
            <?php foreach($AllProductStore as $key => $value):?>
                <div class="ps-product ps-product--wide">
                    <div class="ps-product__thumbnail">
                        <a href="<?php echo $path . $value->url_job; ?>">
                            <img style="height: 100%;" src="img/jobs/<?php echo $value->url_category; ?>/<?php echo $value->image_job; ?>" alt="<?php echo $value->name_job; ?>">
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
                                <a href="<?php echo $path . $storeRes->url_worker; ?>"><?php echo $storeRes->displayname_user; ?></a>
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
                                <strong> <i class="icon-heart"></i> Wishlist</strong></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
                <h4>No hay Productos</h4>
            <?php endif; ?>
            <div class="ps-pagination">
                <?php if (isset($urlParams[1])) {
                    $CurrentPage = $urlParams[1];
                } else {
                    $CurrentPage = 1;
                } ?>

                <ul class="pagination" data-total-page="<?php echo ceil($totalProductsStore / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>"></ul>
            </div>
        </div>
    </div>
<?php endif; ?>