<div class="titulo">Primeira Classe</div>

<?php 

class Cliente {

     // -- Atributos

     public $nome = "Anônimo";
     public $idade = 18;

     public function apresentar(){
        echo "Nome: " . $this->nome . "<br>" . "Idade: " . $this->idade . '<br>';
     }
    
}

$clientes = new Cliente();
$clientes->nome = 'Henrique';
$clientes->idade = 24;
$clientes->apresentar();

$cliente2 = new Cliente();
$cliente2->nome = 'Nadiele';
$cliente2->idade = 18;
$cliente2->apresentar();
