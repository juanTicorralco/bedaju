<?php
require_once "../controllers/templateController.php";

class ControlleResendEmail{
    public function resendEmail(){
        if(!empty($_POST)){
            $name = $_POST["display"];
            $subject = "Registro BEDAJU";
            $message = "Confirma tu email para crear una cuenta en BEDAJU";
            $url = TemplateController::path() . "acount&login&" . base64_encode($_POST["em"]);
            $post = "Confirmar Email";
            $sendEmail = TemplateController::sendEmail($name, $subject, $_POST["em"], $message, $url, $post);
            if ($sendEmail == "ok") {
                echo "Se reenvio el registro a tu email";
            }
        }
    }
}

$data = new ControlleResendEmail();
$data -> resendEmail();
?>