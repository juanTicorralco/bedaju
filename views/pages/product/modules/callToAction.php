<header class="header header--product header--sticky" data-sticky="true">
    <nav class="navigation">
        <div class="container">
            <article class="ps-product--header-sticky">
                <div class="ps-product__thumbnail">
                    <!-- imagen del producto -->
                    <img class="rounded-circle" src="img/users/<?php echo $workerter->id_user; ?>-<?php echo $workerter->username_user; ?>/<?php echo $workerter->picture_user; ?>" alt="<?php echo $workerter->displayname_user ?>">
                </div>
                <div class="ps-product__wrapper">
                    <div class="ps-product__content">
                        <a class="ps-product__title" href="<?php echo TemplateController::path().$workerter->url_worker; ?>"><?php echo $workerter->displayname_user ?></a>
                    </div>
                    <div class="ps-product__shopping">
                        <!-- precio  -->
                        <?php //if ($producter->offer_product != null) : ?>
                            <!-- <p class="ps-product__price sale text-success">$<?php //echo TemplateController::offerPrice($producter->price_product, json_decode($producter->offer_product, true)[1], json_decode($producter->offer_product, true)[0]); ?> <del>$<?php //echo $producter->price_product; ?></del></p> -->
                        <?php //else : ?>
                            <!-- <p class="ps-product__price">$<?php //echo $producter->price_product; ?></p> -->
                        <?php //endif; ?>
                        <h4 class="ps-product__price sale">Cotizaciones: <strong class="text-success">$<?php echo $workerter->price_worker; ?></strong></h4>
                        <a class="ps-btn btn" 
                            onclick="addBagCard('<?php echo $workerter->url_worker; ?>', '<?php echo $producter->url_category; ?>', '<?php echo $workerter->picture_user; ?>', '<?php echo $workerter->displayname_user; ?>', '<?php echo $workerter->price_worker; ?>', '<?php echo $path ?>', '<?php echo CurlController::api(); ?>', this)"
                            detailSC 
                            quantitySC
                        >Cotizar</a>
                    </div>
                </div>
            </article>
        </div>
    </nav>
</header>