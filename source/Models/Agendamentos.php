<?php 
namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Agendamentos extends DataLayer
{
    /** PARÂMETROS ESPERADOS NA FUNÇÃO CONSTRUTORA
     
     * 1. nome da tabela (String)
     * 2. campos obrigatórios (Array)
     * 3. chave primária (String) __ Padrão = First
     * 4. timestamps (Bool): informa se existe um campo de datetime __ Padrão = true
     
     */
    public function __construct()
    {
        parent::__construct("agendamentos", ['funcionario', 'data', 'local'], "id", false);
    }
}