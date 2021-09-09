<?php

namespace Source\Controller;

use Source\Models\Agendamentos;

class Admin
{
    static function mudarRegulamento($n)
    {
        $sql = "UPDATE config SET valor=? WHERE campo=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $n);
        $stmt->bindValue(2, "regulamento");
        $stmt->execute();
        return Admin::verRegulamento();
    }

    static function verRegulamento()
    {
        $sql = "SELECT * FROM config WHERE campo=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, "regulamento");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
    }

    static function mudarCapacidade ($n, $estacao)
    {
        $sql = "UPDATE config SET valor=? WHERE campo=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $n);
        $stmt->bindValue(2, "capacidade_$estacao");
        $stmt->execute();
        return Admin::verCapacidade();
    }

    static function verCapacidade ($estacao = "x")
    {
        if($estacao == "x"){
            $sql = "SELECT * FROM config WHERE campo=?";
            $stmt = Agendamentos::getConn()->prepare($sql);
            $stmt->bindValue(1, "capacidade_SP");
            $stmt->execute();
            $sp = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
            $stmt->bindValue(1, "capacidade_Santos");
            $stmt->execute();
            $santos = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
            return ["SP"=>$sp['valor'], "Santos"=>$santos['valor']];
        }
        $sql = "SELECT * FROM config WHERE campo=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, "capacidade_$estacao");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC)[0]; 
    }
}