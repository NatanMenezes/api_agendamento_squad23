<h1 align="center">API FCalendar</h1>

<img src="foto.png" ><br>

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
<p>Para fazer o login, é necessário fazer uma requisição post para a rota /login, seguindo o padrão: </p>

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
<p>Para ver todos os agendamentos já realizados no sistema, basta acessar a rota /calendario. Será retornado um array de objetos no formato json da seguinte maneira: </p>
    
    [{
        "id": "1",
        "id_funcionario": "1",
        "data": "24/09/2021 T",
        "estacao": "SP"
    },
    {
        "id": "2",
        "id_funcionario": "1",
        "data": "25/09/2021 M",
        "estacao": "Santos"
    }...]
<h2 id="novo-agendamento">Novo Agendamento</h2>
<p>Para fazer um novo agendamento, é só acessar a rota /agendamentos/novo, e passar os dados da seguinte maneira via post: </p>

    id_funcionario: 1 (int)
    data: 10/10/2021 (string)
    turno: T (string M ou T)
    local: Santos (string Santos ou SP)

<p>Após feito isso, o sistema retornará, em caso de sucesso: </p>

    {
        "status": true,
        "message": "Adicionado com sucesso"
    }

<p>Caso o agendamento já exista, o sistema retornará um true, com a mensagem: "Já existente". Em caso de erro, o sistema retorna um false, com a mensagem: "Dados insuficientes".</p>

<h2 id="cancelar">Cancelar Agendamento</h2>
<p>Para cancelar ou deletar algum agendamento, basta acessar a rota /agendamentos/delete com o id do agendamento passado via post da seguinte maneira: </p>

    id: 1 (int)

<p>Em caso de sucesso, o retorno será: </p>

    {
      "status": true,
      "message": "Deletado com sucesso"
    }

<p>Caso o id não seja passado corretamente, o sistema retornará um json com o status false e a mensagem: "Dados insuficientes".</p>

<h2 id="lista-pessoas">Listagem de usuários cadastrados</h2>
<p>Para ver todos os usuários cadastrados no sistema, basta acessar a rota /funcionarios, e será retornado o seguinte json: </p>

    [
        {
          "id": "1",
          "nome": "Natã Vinícius Menezes Guimarães",
          "email": "natanmenezes31@gmail.com",
          "senha": "AdMiNdOsIsTeMa",
          "admin": "1"
        },
        {
          "id": "2",
          "nome": "Stefânio Soares Junior",
          "email": "stefaniojr@live.com",
          "senha": "stefaniosoaresjunior",
          "admin": "0"
        }
        ...
    ]

<p>Essa lista será muito importante na hora de fazer convites por e-mail.</p>

<h2 id="capacidades">Capacidade dos escritórios</h2>