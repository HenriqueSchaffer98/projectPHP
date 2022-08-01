<div class="titulo">Membros Estáticos</div>


<?php

class A {
    // -- O static são valores da classe que não irão sofrer alterações, no caso ele será fixo.
    // Mesmo que sejam criadas diversas instâncias o valor de static sempre será o mesmo
    public $naoStatic = 'Variável de Insância';
    public static $static = 'Variável de Classe (Estatica)';

    public function mostrarA(){
        echo "Não estático = {$this->naoStatic} <br>";
        // -- Tentatica 1
        //echo "Estático = {$this->static} <br>";
        // -- Tentatica 2 - Utilizando o self
        //echo "Estático = {self::$static} <br>";
        // -- Tentativa 3 - Maneira correta
        echo "Estático = " . self::$static . "<br>";
    }

    public static function mostrarStaticA(){
        // -- Em uma funçao estatica não é possível acessar o This.
        //echo "Não estático {$this->naoStatic}<br>";
        echo "Estático = " . self::$static . "<br>";
    }

}
echo "Classe A<br>";
$objetoA = new A();
$objetoA->mostrarA();
echo "Funcão estatica<br>";
$objetoA->mostrarStaticA();
// -- Forma correta de acessar uma função estatica.
echo "Forma correta de acessar a funcão estatica    <br>";
A::mostrarStaticA();
