<?php 
namespace Source\Models;

class Agendamentos
{
    private static $instance;

    public static function getConn(){

        if(!isset(self::$instance)){
            self::$instance = new \PDO("mysql:host=localhost;dbname=sistema_agendamento;charset=utf8", "root", "");
        }

        return self::$instance;
    }
}