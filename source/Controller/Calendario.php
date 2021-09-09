<?php

namespace Source\Controller;
use Source\Models\Agendamentos;
class Calendario
{


    static function AllData()
    {
        $sql = "SELECT * FROM agendamentos";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
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
        
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return null;
        }

    }

}
