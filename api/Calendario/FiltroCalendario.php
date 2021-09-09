<?php

    require_once( "../../vendor/autoload.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    use Source\Controller\Calendario;
    use Source\Controller\Helpers;
    if(isset($_POST["data"]) && isset($_POST["estacao"]))
        {
            $data = $_POST['data'];
            $datam = Helpers::juntarDataTurno($_POST['data'], "M");
            $datat = Helpers::juntarDataTurno($_POST['data'], "T");
            $manha = Calendario::PegaAgendamentos($datam, $_POST["estacao"] );
            $tarde = Calendario::PegaAgendamentos($datat, $_POST["estacao"] );

            $totalm = 0;
            $totalt = 0;
            if (!$tarde == null){
                foreach ($tarde as $value) {
                    $totalt = $totalt+1;
                    
                }
            }
            if (!$manha == null){
                foreach ($manha as $value) {
                    $totalm = $totalm+1;
                    
                }
            }
            echo json_encode(["Data"=>$data, "Total Manha"=>$totalt, "Total Tarde"=>$totalm], JSON_UNESCAPED_SLASHES);


            
        }else{
            echo json_encode(["message"=>"Dados insuficientes"]);
        };
    
?>