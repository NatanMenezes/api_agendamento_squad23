<?php

    require_once( "../../vendor/autoload.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    use Source\Controller\Calendario;
    use Source\Controller\Helpers;
    if(isset($_POST["data"]) && isset($_POST["estacao"]))
        {
            $data = Helpers::juntarDataTurno($_POST['data'], "M");
            $manha = Calendario::PegaAgendamentos($data, $_POST["estacao"] );

            $total = 0;
            if($manha == null){
                echo json_encode(["message"=>"Não existe"]);
            }else{
                foreach ($manha as $value) {
                        $total = $total+1;
                        
                }
                
                echo json_encode(["Data"=>$data, "Total Manha"=>$total], JSON_UNESCAPED_SLASHES);

            }
            
        }else{
            echo json_encode(["message"=>"Dados insuficientes"]);
        };
    
?>