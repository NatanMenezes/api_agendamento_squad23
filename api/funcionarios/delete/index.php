<?php

require_once( "../../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Consultores;

if(isset($_POST['id']))
{
    Consultores::delete($_POST['id']);
    echo json_encode(["status"=>true, "message"=>"Deletado com sucesso"]);
} else {
    echo json_encode(["status"=>false, "message"=>"Dados insuficientes"]);
}