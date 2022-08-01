<div class="titulo">Visibilidade</div>


<?php 

class A {
    // -- Os metodos privados não podem serem acessados externamente, somente os publicos tem essa capacidade.
    public $publico = 'Público';
    protected $protegido = 'Protegido';
    private $privado = 'Privado';

    // -- Somente com uma método publico podemos exibir esses valores fora da classe.
    public function mostrarA(){
        echo "ClasseA) Publico = {$this->publico}<br>";
        echo "ClasseA) Protegido = {$this->protegido}<br>";
        echo "ClasseA) Privado = {$this->privado}<br>";
    }
    protected function vaiPorHeranca(){
        echo 'Serei transmitido por Herança!<br>';
    }
    // -- Uma função privada também não poderá ser chamada externamente.
    private function naoMostrar(){
        echo 'Não vou imprimir!<br>';
    }
}
echo "Classe A <br>";
$a = new A();
$a->mostrarA();
class B extends A {

    public function mostrarB(){
        echo "ClasseB) Publico = {$this->publico}<br>";
        echo "ClasseB) Protegido = {$this->protegido}<br>";
        // -- Quando tiver herança os métodos privados não são acessíveis.
        echo "ClasseB) Privado = {$this->privado}<br>";

        // -- Acessa uma função protegida, e pode ser acessda somente por dentro da classe ou das classes extendidas.
        parent::vaiPorHeranca();
    }

}
echo "Classe B <br>";

$b = new B();
$b->mostrarB();
