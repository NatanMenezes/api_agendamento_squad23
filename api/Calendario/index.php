<?php

    require_once( "../../vendor/autoload.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    use Source\Controller\Calendario;
    use Source\Controller\Helpers;
    $Alldatas = Calendario::Alldata();
    echo json_encode($Alldatas,JSON_UNESCAPED_SLASHES);

?>