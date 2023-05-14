<div class="ps-section__left">
    <div class="ps-block--vendor">
        <div class="ps-block__thumbnail"><img class="rounded-circle" src="img/users/<?php echo $storeRes->id_user; ?>-<?php echo $storeRes->username_user; ?>/<?php echo $storeRes->picture_user; ?>" alt="<?php echo $storeRes->url_worker; ?>">
        <div class="ps-block__container">
            <div class="ps-block__header">
                <h4><?php echo $storeRes->displayname_user; ?></h4>
                
                <select class="ps-rating" data-read-only="true" style="display: none;">
                    <?php
                        if($reviews > 0){
                            for($i = 0; $i < 5; $i++){
                                if($reviews < ($i + 1)){
                                    echo '<option value="1">'.($i+1).'</option>';
                                }else{
                                    echo '<option value="2">'.($i+1).'</option>';
                                }
                            }
                        }else{
                            echo '<option value="0">0</option>';
                            for($i = 0; $i < 5; $i++){
                                echo '<option value="1">'.($i+1).'</option>';
                            }
                        }
                    ?>
                </select>
                <p><strong><?php echo ($reviews*100)/5; ?>% Positivo</strong> (<?php echo $totalReviews; ?> review)</p>
                <p><strong>Contratado: </strong><?php echo $storeRes->times_hired_worker;?> <small>(veces)</small></p>
                <p><strong>Cotizaciones: </strong><?php echo $storeRes->times_budgeted_worker;?> <small>(veces)</small></p>
            </div><span class="ps-block__divider"></span>
            <div class="ps-block__content">
                <p><strong><?php echo $storeRes->displayname_user; ?></strong>, <?php echo $storeRes->about_worker; ?></p>
                <ul class="ps-product__desc mb-5">
                    <?php foreach (json_decode($storeRes->specialties_worker) as $key2 => $value2) : ?>
                        <li> <?php echo $value2; ?> </li>
                    <?php endforeach; ?>
                </ul>
                <?php if($storeRes->socialnetwork_worker != null): ?>
                    <figure>

                        <ul class="ps-list--social-color">

                            <?php foreach(json_decode( $storeRes->socialnetwork_worker, true) as $index => $item): ?>
                                <li>
                                    <a target="_blank" class="<?php  echo array_keys($item)[0]; ?>" href="<?php  echo $item[array_keys($item)[0]]; ?>">
                                        <i class="fab fa-<?php  echo array_keys($item)[0]; ?>"></i></a>
                                </li>
                            <?php endforeach;?>

                        </ul>

                    </figure>
                <?php endif; ?>
            </div>
            <div class="ps-block__footer">
                <p>Call us directly<strong>(+<?php echo explode("_", $storeRes->phone_worker)[0]; ?>) <?php echo explode("_", $storeRes->phone_worker)[1]; ?></strong></p>
                <!-- <p>or Or if you have any question</p><a class="ps-btn ps-btn--fullwidth" href="">Contact Seller</a> -->
                <strong><?php echo $storeRes->country_worker." | ".$storeRes->city_worker; ?></strong>
            </div>
        </div>
    </div>
    </div>
</div>