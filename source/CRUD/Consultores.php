<?php

namespace Source\CRUD;

use Source\Models\Funcionarios;

class Consultores
{
    static function login($email, $senha)
    {
        $funcionarios = new Funcionarios();
        $funcionario = $funcionarios->find("email = :email AND senha = :senha", "email=$email&senha=$senha")->fetch();
        return $funcionario;

    }
}