<?php
if($totalworkers>7){
    $starAt = rand(0, ($totalworkers - 7));
}else{
    $starAt=0;
}

$select="views_category,id_category,name_category,name_subcategory,country_worker,city_worker,reviews_worker,username_user,price_worker,displayname_user,about_worker,url_worker,picture_user,id_worker,email_worker,id_user,username_user";
$url=CurlController::api()."relations?rel=workers,users,categories,subcategories&type=worker,user,category,subcategory&linkTo=url_subcategory,show_worker&equalTo=".$producter->url_subcategory.",show&orderBy=id_category&orderMode=ASC&startAt=".$starAt."&endAt=7&select=".$select;
$method="GET";
$field=array();
$header=array();
$morworkers= CurlController::request($url, $method, $field, $header)->result;
?>
<div class="ps-section--default ps-customer-bought">
    <div class="ps-section__header">
        <h3>Otros Trabajadores de <?php echo $producter->name_subcategory ?></h3>
    </div>
    <div class="container-fluid preloadTrue">
        <div class="row">
            <div class="clo-xl-2 col-lg-3 clo-sm-4 col-6">
                <div class="ph-item">
                    <div class="ph-col-12">
                        <div class="ph-picture"></div>
                    </div>
                    <div class="ph-col-12">
                        <div class="ph-row">
                            <div class="ph-col-12 big"></div>
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
                            <div class="ph-col-12 big"></div>
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
                            <div class="ph-col-12 big"></div>
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
                            <div class="ph-col-12 big"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-section__content preloadFalse">
        <div class="row">
            <?php foreach ($morworkers as $key => $value) : ?>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail">
                            <a href="<?php echo $path . $value->url_worker; ?>">
                                <img class="rounded-circle" src="img/users/<?php echo $value->id_user; ?>-<?php echo $value->username_user; ?>/<?php echo $value->picture_user; ?>" alt="<?php echo $value->url_worker; ?>">
                            </a>
                            <!-- precio -->
                            <?php //if ($value->stock_job != 0) : ?>
                                <?php //if ($value->offer_job != null) : ?>
                                    <!-- <div class="ps-product__badge">-<?php //echo TemplateController::percentOffer($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?>%</div> -->
                                <?php //endif; ?>
                            <?php //else : ?>
                                <!-- <div class="ps-product__badge out-stock">Out Of Stock</div> -->
                            <?php //endif; ?>
                            <div class="ps-product__badge">Disponible</div>
                            <?php
                                if (in_array($value->url_worker, $wishlist)) {
                                    echo '  <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>';
                                }
                            ?>
                            <div class="invisibleCorazon <?php echo $value->url_worker; ?>">
                                <p mb-5></p>  <div class="ps-product__badge bg-danger mt-5 "><i class="fas fa-heart"></i></div>
                            </div>
                            <ul class="ps-product__actions">
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
                                    <a href="<?php echo $path . $value->url_worker; ?>" data-toggle="tooltip" data-placement="top" title="Quick View">
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
                            <!-- <a class="ps-product__vendor" href="<?php //echo $path . $value->url_worker; ?>"><?php //echo $value->url_worker; ?></a> -->
                            <div class="ps-product__content">
                                <a class="ps-product__title font-weight-bold" href="<?php echo $path . $value->url_worker; ?>"><?php echo $value->displayname_user; ?></a>
                                <small class="font-weight-bold"><?php echo $value->name_subcategory; ?></small>
                                <div class="ps-product__rating">
                                    <?php $reviews = TemplateController::calificationStars(json_decode($value->reviews_worker, true)); ?>
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
                                            if ($value->reviews_worker != null) {
                                                echo count(json_decode($value->reviews_worker, true));
                                            } else {
                                                echo "0";
                                            }
                                            ?>)
                                    </span>
                                </div>
                                <?php //if ($value->offer_job != null) : ?>
                                    <!-- <p class="ps-product__price sale">$<?php //echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php //echo $value->price_job; ?></del></p> -->
                                <?php //else : ?>
                                    <!-- <p class="ps-product__price">$<?php //echo $value->price_job; ?></p> -->
                                <?php //endif; ?>
                                <p class="ps-product__price">Cotizaciones: <strong class="text-success">$<?php echo $value->price_worker; ?></strong></p>
                                <small><?php echo $value->country_worker." | ".$value->city_worker; ?></small>
                            </div>
                            <div class="ps-product__content hover">
                                <a class="ps-product__title font-weight-bold" href="<?php echo $path . $value->url_worker; ?>"><?php echo $value->displayname_user; ?></a>
                                <small class="font-weight-bold"><?php echo $value->name_subcategory; ?></small>
                                <?php //if ($value->offer_job != null) : ?>
                                    <!-- <p class="ps-product__price sale">$<?php //echo TemplateController::offerPrice($value->price_job, json_decode($value->offer_job, true)[1], json_decode($value->offer_job, true)[0]); ?> <del>$<?php //echo $value->price_job; ?></del></p> -->
                                <?php //else : ?>
                                    <!-- <p class="ps-product__price">$<?php //echo $value->price_job; ?></p> -->
                                <?php //endif; ?>
                                <p class="ps-product__price">Cotizaciones: <strong class="text-success">$<?php echo $value->price_worker; ?></strong></p>
                                <small><?php echo $value->country_worker." | ".$value->city_worker; ?></small>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product -->
            <?php endforeach; ?>
        </div>
    </div>
</div><!--  End Customers who bought -->