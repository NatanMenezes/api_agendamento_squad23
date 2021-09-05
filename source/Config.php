<?php

// Configurações iniciais do datalayer
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql", // Driver utilizado
    "host" => "localhost", // Servidor
    "port" => "3306", // Porta
    "dbname" => "sistema_agendamento", // Nome do banco
    "username" => "root", // Nome de usuário
    "passwd" => "", // Senha de acesso ao banco
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);