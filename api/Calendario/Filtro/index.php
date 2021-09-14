<?php

require_once("../../../vendor/autoload.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

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
            $totalt = $totalt + 1;
        }
    }
    if (!$manha == null) {
        foreach ($manha as $value) {
            $totalm = $totalm + 1;
        }
    }
    $capacidadem = round((100 * $totalm) / $x, 2) / 100;
    $capacidadet = round((100 * $totalt) / $x, 2) / 100;
    $capacidadeambos = $capacidadem + $capacidadet;

    echo json_encode(["Data" => $data, "Estacao" => $estacao, "Agendados_Manha" => $totalm, "Capacidade_Usada_Manha" => $capacidadem, "Agendados_Tarde" => $totalt, "Capacidade_Usada_Tarde" => $capacidadet, "Capacidade_Ambos" => $capacidadeambos], JSON_UNESCAPED_SLASHES);
} else {
    echo json_encode(["message" => "Dados insuficientes"]);
};
