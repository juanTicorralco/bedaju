<?php
if (!isset($_SESSION['user'])) {
    echo '<script>
            window.location="' . $path . 'acount&login";
    </script>';
    return;
}else{
    $time= time();
    if($_SESSION["user"]->token_exp_user < $time){
        echo '<script>
        switAlert("error", "Para proteger tus datos, si no hay actividad en tu cuenta, se cierra automaticamente. Vuelve a logearte!", "' . $path . 'acount&logout","");
            
    </script>';
    return;
    }
}
?>
<!--=====================================
My Account Content
======================================--> 

<div class="ps-vendor-dashboard pro">

    <div class="container">

        <div class="ps-section__header">

            <!--=====================================
            Profile
            ======================================--> 

            <?php include "views/pages/acount/profile/profile.php"; ?>

            <!--=====================================
            Nav Account
            ======================================--> 

            <div class="ps-section__content" id="vendor-store">

                <ul class="ps-section__links">
                    <li ><a href="<?php echo $path; ?>acount&wishAcount">Guardados</a></li>
                    <li ><a href="<?php echo $path; ?>acount&my-shopping">Pedidos</a></li>
                    <li class="active"><a href="<?php echo $path; ?>acount&my-worker">Trabajador</a></li>
                    <li><a href="<?php echo $path; ?>acount&my-sales">Metricas</a></li>
                </ul>

                <!--=====================================
                My Store
                ======================================--> 
                <div class="ps-vendor-store">

                    <div class="container">

                        <div class="ps-section__container">

                            <!--=====================================
                            Vendor Profile
                            ======================================--> 

                            <?php include "modules/store.php"; ?>

                            <!--=====================================
                            Products
                            ======================================--> 

                            <?php
                             if(isset($urlParams[2])){
                                if($urlParams[2] == "orders" || $urlParams[2] == "disputes" || $urlParams[2] == "messages"){
                                    include "modules/".$urlParams[2].".php";
                                }else{
                                    include "modules/products.php";   
                                }
                             }else{ 
                                 include "modules/products.php";
                             }
                            ?>
                        </div>
                    </div>
                </div>
                

            </div>


        </div>

    </div>

</div>

   