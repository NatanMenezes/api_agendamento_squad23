<h1 align="center">API FCalendar</h1>

* [Sobre](#Sobre)
* [Pré-requisitos](#Pré-requisitos)
* [Instalação](#Instalação)
* [Como Usar](#como-usar)
  * [Login](#login)
  * [Ver Agendamentos](#lista-agendamentos)
    * [Todos](#todos-agendamentos)
    * [Por pessoa](#agendamentos-pessoa)
    * [Por data](#agendamentos-data)
  * [Novo Agendamento](#novo-agendamento)
  * [Cancelar Agendamento](#cancelar)
  * [Listagem de Usuarios](#lista-pessoas)
  * [Capacidade dos escritorios](#capacidades)
    * [Ver Capacidade](#ver-capacidade)
    * [Mudar Capacidade](#mudar-capacidade)
    * [Ver Regulamento COVID](#ver-regulamento)
    * [Mudar Regulamento COVID](#mudar-regulamento)
* [Tecnologias utilizadas](#tecnologias)

# Sobre
<img src="foto.png" ><br>
<p>FCalendar é um sistema de agendamento para a presença em estações de trabalho, desenvolvido em um hackathon promovido pela empresa FCamara.</p>

# Pré-requisitos
<ul>
    <li>PHP 7+ instalado</li>
    <li>Banco de dados MySql</li>
    <li>Servidor Apache</li>
</ul>

# Instalação
<ol>
    <li>Instale o Wamp Server ou similar e execute-o.</li>
    <li>Abra o phpmyadmin e crie um banco de dados com o nome sistema_agendamentos e importe o arquivo db.sql, que pode ser encontrado na pasta raiz da aplicação.</li>
    <li>Pronto, instalação concluída. Agora é só seguir as instruções de utilização da API.</li>
</ol>

# Como usar

<h2 id="login">Login</h2>
<p>Para fazer o login, é necessário fazer uma requisição post seguindo o padrão: </p>

    email: "natanmenezes31@gmail.com"
    senha: "AdMiNdOsIsTeMa"

<p>A requisição acima com os dados acima, gerará o seguinte retorno na API padrão: </p>

    {
        "status": true,
        "id": "1",
        "nome": "Natã Vinícius Menezes Guimarães",
        "email": "natanmenezes31@gmail.com",
        "message": "Sucesso no login"
    }

<p>Em caso de erro no login, o retorno será: </p>

    {
        "status": false,
        "message": "Login Inválido"
    }

<p>Caso haja erro na requisição, o sistema enviará algo parecido, só que com a mensagem: "Dados insuficientes".</p>
<h2 id="lista-agendamentos">Ver agendamentos</h2>
<h2 id="novo-agendamento">Novo Agendamento</h2>
<h2 id="cancelar">Cancelar Agendamento</h2>


