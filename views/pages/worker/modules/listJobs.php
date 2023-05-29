<div class="ps-section__content">

                        <div class="row">

                        <?php foreach($AllProductStore as $key => $value):?>

                            <div class="col-lg-4 col-md-6 col-12">

                                <article class="ps-block--store">

                                    <div class="ps-block__thumbnail bg--cover" style="background: url(img/users/<?php echo $storeRes->id_user; ?>-<?php echo $storeRes->username_user; ?>/jobs/<?php echo $value->cover_job; ?>);"></div>

                                    <div class="ps-block__content">

                                        <div class="ps-block__author">

                                            <a class="ps-block__user btn" href="<?php echo TemplateController::path().$value->url_job; ?>">

                                                <img src="img/users/<?php echo $storeRes->id_user; ?>-<?php echo $storeRes->username_user; ?>/jobs/<?php echo $value->image_job; ?>"></a><a class="ps-btn" href="<?php echo TemplateController::path().$value->url_job; ?>"><i class="icon-eye font-weight-bold"></i></a>

                                        </div>

                                        <h5><?php echo $value->name_job;?></h5>

                                        <div class="br-wrapper br-theme-fontawesome-stars">

                                            <!-- <div class="ps-product__badge bg-danger mt-5 "><i class="fa-solid fa-circle-heart"></i></i></div> -->
                                            <!-- <button class="ps-product__badge bg-primary border text-white rounded-pill border-primary shadow-none p-3 "><i class="fas fa-thumbs-up"></i> <strong><?php //echo $value->likes_job; ?></strong></button> -->
                                            <button class="btn ps-product__badge bg-white border border-primary text-primary rounded-pill p-3" onclick="likeFunk('<?php echo $_SESSION['user']->id_user ?>','<?php echo $value->url_job; ?>', '<?php echo CurlController::api(); ?>')"><i class="fas fa-thumbs-up"></i> <strong class="job<?php echo $value->id_job ?>"><?php echo $value->likes_job; ?></strong></button>
                                            <button class="btn ps-product__badge bg-primary border text-white rounded-pill border-primary shadow-none p-3 "><i class="fas fa-comment"></i> <strong><?php echo $value->likes_job; ?></strong></button>

                                            

                                            <?php
                                            //    $select = "reviews_product";
                                            //    $url = CurlController::api()."jobs?linkTo=id_worker_job&equalTo=".$value->id_worker."&select=".$select;
                                            //    $dataReview = CurlController::request($url,$method,$headers,$fields);
                                            //    $reviews = 0;
                                            //    $totalReviews = 0;

                                            //    if($dataReview->status == 200){
                                            //     foreach($dataReview->result as $index => $item){
                                            //         if($item->reviews_product != null){
                                            //             foreach(json_decode($item->reviews_product, true) as $indx => $item2){
                                            //                 $reviews += $item2["review"];
                                            //                 $totalReviews++;
                                            //             }
                                            //         }
                                            //     }
                                            //     if($reviews > 0 && $totalReviews >0){
                                            //         $reviews = round($reviews/$totalReviews);
                                            //     }
                                            //    }
                                            ?>

                                            <!-- <select class="ps-rating" data-read-only="true" style="display: none;">

                                                <?php
                                                // if($reviews > 0){
                                                //     for($i = 0; $i < 5; $i++){
                                                //         if($reviews < ($i + 1)){
                                                //             echo '<option value="1">'.($i+1).'</option>';
                                                //         }else{
                                                //             echo '<option value="2">'.($i+1).'</option>';
                                                //         }
                                                //     }
                                                // }else{
                                                //     echo '<option value="0">0</option>';
                                                //     for($i = 0; $i < 5; $i++){
                                                //         echo '<option value="1">'.($i+1).'</option>';
                                                //     }
                                                // }
                                                ?>

                                            </select> -->

                                        </div>

                                        <ul class="">
                                                <?php foreach (json_decode($value->summary_job) as $key2 => $value2) : ?>
                                                    <li> <small>-<?php echo $value2; ?></small></li>
                                                <?php endforeach; ?>
                                            </ul>


                                        <!-- <p><?php //echo $value->country_job." | ".$value->city_job." | ".$value->address_job ; ?></p> -->

                                        <!-- <ul class="ps-block__contact"> -->
                                        
                                            <!-- <li>
                                                <i class="icon-envelope"></i>
                                                <a href="mailto:<?php //echo $value->email_worker; ?>"><?php //echo $value->email_worker; ?></a>
                                            </li> -->

                                            <!-- <li>
                                                <i class="icon-telephone"></i> (+<?php //echo explode("_", $value->phone_worker)[0]; ?>) <?php //echo explode("_", $value->phone_worker)[1]; ?>
                                            </li> -->

                                        <!-- </ul> -->

                                        <?php //if($value->socialnetwork_worker != null): ?>
                                            <!-- <figure>

                                                <ul class="ps-list--social-color">

                                                    <?php //foreach(json_decode( $value->socialnetwork_worker, true) as $index => $item): ?>
                                                        <li>
                                                            <a target="_blank" class="<?php  //echo array_keys($item)[0]; ?>" href="<?php  //echo $item[array_keys($item)[0]]; ?>">
                                                                <i class="fab fa-<?php  //echo array_keys($item)[0]; ?>"></i></a>
                                                        </li>
                                                    <?php //endforeach;?>

                                                </ul>

                                            </figure> -->
                                        <?php //endif; ?>

                                    </div>

                                </article>

                            </div>
                        
                        <?php endforeach; ?>

                        </div>
                        <div class="ps-pagination">
                            <?php if (isset($urlParams[1])) {
                            $CurrentPage = $urlParams[1];
                            } else {
                                $CurrentPage = 1;
                            } ?>

                            <ul class="pagination" data-total-page="<?php echo ceil($totalProductsStore / $endAt) ?>" data-current-page="<?php echo $CurrentPage; ?>" data-url-page="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            </ul>
                        </div>
                    </div>