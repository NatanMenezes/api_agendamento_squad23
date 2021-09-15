<?php

require_once("../../../vendor/autoload.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


use Source\Controller\Calendario;
use Source\Controller\Helpers;

if (isset($_POST["data"]) && isset($_POST["estacao"])) {
    $totalm = 0;
    $totalt = 0;
    $data = $_POST['data'];
    $estacao = $_POST['estacao'];
    $datam = Helpers::juntarDataTurno($_POST['data'], "M");
    $datat = Helpers::juntarDataTurno($_POST['data'], "T");
    $manha = Calendario::PegaAgendamentos($datam, $_POST["estacao"]);
    $tarde = Calendario::PegaAgendamentos($datat, $_POST["estacao"]);
    $capacidade = Calendario::CapacidadeTotal($estacao);
    $regulamento = Calendario::Regulamento();
    $x = (($capacidade * $regulamento) / 100);
    if (!$tarde == null) {
        foreach ($tarde as $value) {
            $totalt = $totalt + 1; //
        }
    }
    if (!$manha == null) {
        foreach ($manha as $value) {
            $totalm = $totalm + 1; //
        }
    }
    $capacidadem = (((100 * $totalm) / $x) / 100) / 100;
    $capacidadet = (((100 * $totalt) / $x) / 100) / 100;
    $capacidadeambos = $capacidadem + $capacidadet;
    echo json_encode(["Data" => $data, "Estacao" => $estacao, "Agendados_Manha" => $totalm, "Capacidade_Usada_Manha" => number_format($capacidadem, 4, '.', ''), "Agendados_Tarde" => $totalt, "Capacidade_Usada_Tarde" => number_format($capacidadet, 4, '.', ''), "Capacidade_Ambos" => number_format($capacidadeambos, 4, '.', '')], JSON_UNESCAPED_SLASHES);
} else {
    echo json_encode(["message" => "Dados insuficientes"]);
};
