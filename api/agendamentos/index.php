<?php

require_once( "../../vendor/autoload.php");

use Source\Models\Agendamentos;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Agendamento;

if(isset($_POST["id_funcionario"]))
{
    $res = Agendamento::findByIdFuncionario($_POST["id_funcionario"]);
    echo json_encode(["status"=>"success","data"=>$res]);
}else{
    echo "Nada a retornar";
}