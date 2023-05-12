<?php

$url = CurlController::api() . "promotions?select=id_promotion";
$method = "GET";
$field = array();
$header = array();

$totalpromotions = CurlController::request($url, $method, $field, $header);
if($totalpromotions->status == 200){
    $totalpromotions = $totalpromotions->total;
}else{
    $totalpromotions = 0;
}

$aleatorPromotion = rand(0, ($totalpromotions - 5));
$url = CurlController::api()."relations?rel=promotions,workers&type=promotion,worker&linkTo=show_promotion&equalTo=show&orderBy=Id_promotion&orderMode=ASC&startAt=$aleatorPromotion&endAt=5&select=horizontal_slider_promotion,url_worker,id_worker";
$method = "GET";
$field = array();
$header = array();

$productsHSlider = CurlController::request($url, $method, $field, $header)->result;
?>

<div class="container-fluid preloadTrue">


    <div class="ph-item border-0">
        <div class="ph-col-4">
            <div class="ph-row">
                <div class="ph-col-10"></div>
                <div class="ph-col-10 big"></div>
                <div class="ph-col-6 big"></div>
                <div class="ph-col-6 empty"></div>
                <div class="ph-col-6 big"></div>
            </div>
        </div>
        <div class="ph-col-8">
            <div class="ph-picture"></div>
        </div>

    </div>

</div>

<div class="ps-home-banner preloadFalse">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">

        <?php foreach ($productsHSlider as $key => $value) :
            $horizontalSlider = json_decode($value->horizontal_slider_promotion, true);
        ?>

            <div class="ps-banner--market-4" data-background="img/promotions/<?php echo $value->id_worker; ?>-<?php echo $value->url_worker; ?>/horizontal/<?php echo $horizontalSlider["IMG tag"]; ?>">
                <img src="img/promotions/<?php echo $value->id_worker; ?>-<?php echo $value->url_worker; ?>/horizontal/<?php echo $horizontalSlider["IMG tag"]; ?>" alt="<?php echo $value->url_worker; ?>">
                <div class="ps-banner__content">
                    <h4> <?php echo $horizontalSlider["H4 tag"]; ?> </h4>
                    <h3> <?php echo $horizontalSlider["H3-1 tag"]; ?> <br />
                        <?php echo $horizontalSlider["H3-2 tag"]; ?> <br />
                        <p> <?php echo $horizontalSlider["H3-3 tag"]; ?> <strong> <?php echo $horizontalSlider["H3-4s tag"]; ?> </strong></p>
                    </h3>
                    <a class="ps-btn" href="<?php echo $path . $value->url_worker; ?>"> <?php echo $horizontalSlider["Button tag"]; ?> </a>
                </div>
            </div>
        <?php

        endforeach;
        ?>
    </div>

</div><!-- End Home Banner-->