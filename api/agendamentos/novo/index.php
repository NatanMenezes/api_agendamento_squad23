<?php

require_once( "../../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Agendamento;

if(isset($_POST["id_funcionario"]) && isset($_POST["data"]) && isset($_POST["local"]))
{
    var_dump(Agendamento::create($_POST["id_funcionario"], $_POST["data"], $_POST["local"]));
}else{
    echo "nada";
}