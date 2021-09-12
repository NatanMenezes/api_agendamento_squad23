<?php

require_once( "../../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Consultores;
use Source\Controller\Helpers;

if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["admin"]))
{
    if(Consultores::create($_POST["nome"], $_POST['email'], $_POST["senha"], $_POST['admin']))
    {
        echo json_encode(['status'=> true, 'message'=>"Adicionado com sucesso"]);
    }
}else{
    echo json_encode(["status"=>false, "message"=>"Dados insuficientes"]);
}