<?php

namespace Source\Controller;

use Source\Models\Agendamentos;
use Source\Controller\Helpers;

class Calendario
{


    static function AllData()
    {
        $sql = "SELECT * FROM agendamentos";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->execute();
        $json_data = array(); //cria o array
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $rec) //foreach loop
            {
                $json_array['id'] = $rec['id'];
                $json_array['id_funcionario'] = $rec['id_funcionario'];
                $json_array['data']  = substr($rec['data'], 0, 10);
                $json_array['turno']  = substr($rec['data'], 11, 1);
                $json_array['estacao'] = $rec['estacao'];

                array_push($json_data, $json_array);
            }
            return $json_data;
        } else {
            return "Sem retorno";
        }
    }

    static function PegaAgendamentos($data, $estacao)
    {
        $sql = "SELECT * FROM agendamentos WHERE data=? AND estacao=?";

        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $data);
        $stmt->bindValue(2, $estacao);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return null;
        }
    }

    static function CapacidadeTotal($estacao)
    {

        if ($estacao == "SP") {
            $sql = "SELECT valor FROM config WHERE campo=?";
            $stmt = Agendamentos::getConn()->prepare($sql);
            $stmt->bindValue(1, "capacidade_SP");
            $stmt->execute();
            return $stmt->fetch()[0];
        }
        if ($estacao == "Santos") {
            $sql = "SELECT valor FROM config WHERE campo=?";
            $stmt = Agendamentos::getConn()->prepare($sql);
            $stmt->bindValue(1, "capacidade_Santos");
            $stmt->execute();
            return $stmt->fetch()[0];
        }
    }

    static function Regulamento()
    {
        $sql = "SELECT valor FROM config WHERE campo=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, "regulamento");
        $stmt->execute();
        return $stmt->fetch()[0];
    }
}
