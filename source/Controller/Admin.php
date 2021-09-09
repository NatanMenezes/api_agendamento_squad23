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
}