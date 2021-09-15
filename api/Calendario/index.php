<?php

require_once("../../vendor/autoload.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


use Source\Controller\Calendario;

$Alldatas = Calendario::Alldata();
echo json_encode($Alldatas, JSON_UNESCAPED_SLASHES);
