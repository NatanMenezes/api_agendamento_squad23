<?php

    require_once( "../../vendor/autoload.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    use Source\Controller\Calendario;
    use Source\Controller\Helpers;
    if(isset($_POST["data"]) && isset($_POST["local"]))
        {
            $data = Helpers::juntarDataTurno($_POST['data'], "M");
            $manha = Calendario::PegaAgendamentos($data, $_POST["local"] );

            
            echo json_encode($manha,JSON_UNESCAPED_SLASHES);
            

        }else{
            echo json_encode(["message"=>"Dados insuficientes"]);
        };
?>