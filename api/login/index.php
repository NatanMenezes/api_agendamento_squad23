<?php

require "../../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

use Source\Controller\Agendamento;
use Source\Controller\Consultores;

if(isset($_POST['email']) && isset($_POST['senha']))
{
    $verifica = Consultores::login($_POST['email'], $_POST['senha']);

    if(!$verifica)
    {
        echo json_encode(["status"=>false, "message"=>"Login Inválido"]);
    } else
    {
        $nome = $verifica[0]['nome'];
        $id = $verifica[0]['id'];
        $primeiro_acesso = Agendamento::findByIdFuncionario($id);
        if($primeiro_acesso == null){
            $primeiro_acesso = true;
        }else{
            $primeiro_acesso = false;
        }
        echo json_encode(["status"=>true, "id"=>$id,"nome"=>$nome, "email"=>$_POST['email'], "message"=>"Sucesso no login", "primeiro_acesso"=>$primeiro_acesso]);
    }
}else{
    echo json_encode(["status"=>false, "message"=>"Dados insuficientes"]);
};