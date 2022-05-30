<div class="titulo">Construtor && Destrutor</div>

<?php


class Pessoa {

    public $nome;
    public $idade;

    function __construct($nome, $idade)
    {
        echo 'Construtor invocado...<br>';
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function __destruct()
    {
        echo 'Destruct...';
    }

    public function apresentar(){
        echo 'Nome: ' . $this->nome . '<br>' . 'Idade: ' . $this->idade . '<br>';
    }

}

$pessoa = new Pessoa('Henrique', 24);

$pessoa->apresentar();

unset($pessoa);