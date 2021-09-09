<?php

require_once( "../../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Agendamento;
use Source\Controller\Helpers;

if(isset($_POST["id_funcionario"]) && isset($_POST["data"]) && isset($_POST["local"]) && isset($_POST["turno"]))
{
    $data = Helpers::juntarDataTurno($_POST['data'], $_POST['turno']);
    if(Agendamento::create($_POST["id_funcionario"], $data, $_POST["local"]) == null)
    {
        echo json_encode(['status'=> true, 'message'=>"Adicionado com sucesso"]);
    } else if(Agendamento::create($_POST["id_funcionario"], $data, $_POST["local"]) == "Existente") 
    {
        echo json_encode(['status'=> true, "message"=>"Já agendado"]);
    }
}else{
    echo json_encode(["status"=>false, "message"=>"Dados insuficientes"]);
}