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
        $nome = $verifica[0]['nome'];
        $id = $verifica[0]['id'];
        echo json_encode(["status"=>"sucesso", "id"=>$id,"nome"=>$nome, "email"=>$_POST['email']]);
    }
}else{
    echo json_encode(["status"=>"invalido"]);
};