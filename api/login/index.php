<?php

require "../../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Consultores;

if(isset($_POST['email']) && isset($_POST['senha']))
{
    $verifica = Consultores::login($_POST['email'], $_POST['senha']);

    if(!$verifica)
    {
        echo json_encode(["status"=>"invalido"]);
    } else
    {
        echo json_encode(["status"=>"sucesso"]);
    }
}else{
    echo json_encode(["status"=>"invalido"]);
};