<?php

namespace Source\Controller;
use Source\Models\Agendamentos;
class Agendamento
{
    static function create($id_funcionario, $data, $estacao)
    {
        if(Agendamento::findAgendamento($id_funcionario, $data) == null)
        {
            $sql = "INSERT INTO agendamentos (id_funcionario, data, estacao) VALUES (?,?,?)";
            $stmt = Agendamentos::getConn()->prepare($sql);
            $stmt->bindValue(1, $id_funcionario);
            $stmt->bindValue(2, $data);
            $stmt->bindValue(3, $estacao);
            $stmt->execute();
        }else{
            return "Existente";
        }
    }

    static function findByIdFuncionario($id_funcionario)
    {
        $sql = "SELECT * FROM agendamentos WHERE id_funcionario=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $id_funcionario);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return "Nada";
        }
    }

    static function findAgendamento($id_funcionario, $data)
    {
        $sql = "SELECT * FROM agendamentos WHERE id_funcionario=? AND data=?";

        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $id_funcionario);
        $stmt->bindValue(2, $data);
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return null;
        }
    }

    static function delete($id)
    {
        $sql = "DELETE FROM agendamentos WHERE id=?";
        $stmt = Agendamentos::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

}
