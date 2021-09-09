<?php

require_once( "../../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Admin;

if(isset($_POST['regulamento_novo']))
{
    $change = Admin::mudarRegulamento($_POST['regulamento_novo']);
    echo json_encode(["status"=>true, "message"=>"Regulamento alterado com sucesso","regulamento"=>$change['valor']]);
} else {
    $regulamento = Admin::verRegulamento();
    echo json_encode(["status"=>false, "message"=>"Dados insuficientes", "regulamento"=>$regulamento['valor']]);
}