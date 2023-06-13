<!--=====================================
Breadcrumb
======================================-->

<div class="ps-breadcrumb">

    <div class="container">

        <ul class="breadcrumb">

            <li><a href="/">Home</a></li>

            <li>Mi Cuenta</li>

        </ul>

    </div>

</div>

<?php
if (isset($urlParams[1])) {
    if (!empty($urlParams[1])) {
        if(strstr($urlParams[1], "?") != false){
            $urlParams[1] = explode("?", $urlParams[1])[0];
        }
    }
    if ($urlParams[1] == "enrollment" || $urlParams[1] == "login" || $urlParams[1]=="wishAcount" || $urlParams[1]=="logout" || $urlParams[1]=="my-shopping" || $urlParams[1]=="my-work" || $urlParams[1]=="new-store" || $urlParams[1]=="my-sales") {
        // if (isset($urlParams[2])) {
            //     if ($urlParams[2] == "facebook") {
                //         $url = $path . "acount&enrollment&facebook";
                //         $responseLoGFace = ControllerUser::loginFacebook($url);
                //     }
                // }
        
        if($urlParams[1]== "my-work"){
            if(isset($_SESSION["user"])){
                $select = "id_worker";
                $url=CurlController::api()."workers?linkTo=id_user_worker&equalTo=".$_SESSION["user"]->id_user."&select=".$select;
                $method="GET";
                $fields= array();
                $headers=array();
                $idWorker=CurlController::request($url, $method, $fields, $headers);

                if($idWorker->status == "404"){
                    $urlParams[1]="new-store";
                }
            }
        }
        include $urlParams[1] . "/" . $urlParams[1] . ".php";
    } else {
        echo '<script> 
                window.location= "' . $path . '";
              </script>';
    }
} else {
    echo '<script> 
    window.location= "' . $path . '";
</script>';
}
?>