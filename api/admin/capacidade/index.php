<?php

require "../../../vendor/autoload.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Admin;

if(isset($_POST['estacao'], $_POST['capacidade']))
{
    $capacidade = Admin::mudarCapacidade($_POST['capacidade'], $_POST['estacao']);
    echo json_encode($capacidade);
} else {
    $capacidade = Admin::verCapacidade();
    echo json_encode($capacidade);
}