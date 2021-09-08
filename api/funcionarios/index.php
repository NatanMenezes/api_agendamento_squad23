<?php

require_once( "../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
use Source\Controller\Consultores;

$funcionarios = Consultores::lista();

echo json_encode($funcionarios);