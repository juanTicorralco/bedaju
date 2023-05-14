<?php if($totalProductsStore > 1): ?>
    <div class="ps-vendor-best-seller">
        <div class="ps-section__header">
            <h3>Mas vendidos</h3>
            <div class="ps-section__nav"><a class="ps-carousel__prev" href="#vendor-bestseller"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#vendor-bestseller"><i class="icon-chevron-right"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="owl-slider" id="vendor-bestseller" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                <?php foreach($bestSalesStore as $key => $value): ?>
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="<?php echo $path.$value->url_job; ?>"><img src="img/jobs/<?php echo $value->url_category ?>/<?php echo $value->image_job ?>" alt="<?php echo $value->image_job ?>"></a>
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
                            <ul class="ps-product__actions">
                                <li>
                                    <a 
                                    class="btn" 
                                    onclick="addBagCard('<?php echo $value->url_job; ?>', '<?php echo $value->url_category; ?>', '<?php echo $value->image_job; ?>', '<?php echo $value->name_job; ?>', '<?php echo $value->price_job; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                                    detailSC 
                                    quantitySC
                                    data-toggle="tooltip" data-placement="top" title="Add to Cart">
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
                            <a class="ps-product__vendor" href="<?php echo $path . $value->url_job?>"></a>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="<?php echo $path . $value->url_job?>"><?php echo $value->name_job ?></a>
                                <div class="ps-product__rating">
                                <?php //$reviews = TemplateController::calificationStars(json_decode($value->reviews_product, true)); ?>

                                    <!-- <select class="ps-rating" data-read-only="true"> -->

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
                                    <!-- <span>( -->
                                        <?php
                                        // if ($value->reviews_product != null) {
                                        //     echo count(json_decode($value->reviews_product, true));
                                        // } else {
                                        //     echo "0";
                                        // }
                                        ?> 
                                        <!-- review)</span> -->
                                </div>
                                <?php if ($value->offer_job != null) : ?>
                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php echo $value->price_job; ?></del></p>
                                <?php else : ?>
                                    <p class="ps-product__price">$<?php echo $value->price_job; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="<?php echo $path . $value->url_job; ?>"><?php echo $value->name_job ?></a>
                                <?php if ($value->offer_job != null) : ?>
                                    <p class="ps-product__price sale">$<?php echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php echo $value->price_job; ?></del></p>
                                <?php else : ?>
                                    <p class="ps-product__price">$<?php echo $value->price_job; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>