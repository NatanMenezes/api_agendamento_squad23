<?php

require_once( "../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Agendamento;

if(isset($_POST["id_funcionario"]))
{
    $res = Agendamento::findByIdFuncionario($_POST["id_funcionario"]);
    echo json_encode(["status"=>true,"data"=>$res, "message"=>"Agendamentos enviados com sucesso"], JSON_UNESCAPED_SLASHES);
}else{
    echo json_encode(["status"=>false,"data"=>$res, "message"=>"Dados insuficientes"]);
}