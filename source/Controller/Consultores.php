<?php

namespace Source\Controller;

use Source\Models\Agendamentos;

class Consultores
{
    static function login($email, $senha)
    {
        $sql = "SELECT * FROM funcionarios WHERE email=? AND senha=?";

        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return null;
        }

    }

    static function lista()
    {
        $sql = "SELECT * FROM funcionarios";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return "Nada";
        }
    }

    static function create($nome, $email, $senha, $admin)
    {
        $sql = "INSERT INTO funcionarios (nome, email, senha, admin) VALUES (?,?,?,?)";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $senha);
        $stmt->bindValue(4, $admin);
        $stmt->execute();
        return true;
    }

    static function delete($id)
    {
        $sql = "DELETE FROM funcionarios WHERE id=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}