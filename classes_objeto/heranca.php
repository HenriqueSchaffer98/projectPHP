<div class="titulo">Herança</div>

<?php

class Pessoa {
    
    public $nome;
    public $idade;

    function __construct($novoNome, $idade){
        $this->nome = $novoNome;
        $this->idade = $idade;

        echo 'Pessoa Criada! <br>';
    }
    function __destruct()
    {
        echo 'Pessoa diz Tchau!';
    }

    public function apresentar(){
        echo "{$this->nome}, {$this->idade} anos";
    }
}
class Usuario extends Pessoa {
    
    public $login;
    

    function __construct($nome, $idade, $login)
    {   
        $this->nome = $nome;
        $this->idade = $idade;
        $this->login = $login;
        echo 'Usuário criado! <br>';
    }
    function __destruct()
    {
        echo 'Usuário diz Tchau!!';
    }

    public function apresentar()
    {
        echo "{$this->login}: {$this->nome}, {$this->idade} anos";
        
    }

}

$usuario = new Usuario('Henrique Schaffer', '23', 'hschaffer');
unset($usuario); // Chama o destruct 