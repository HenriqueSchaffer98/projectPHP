<div class="titulo">Função e Escopo</div>

<?php
    function imprimirMenssagens(){
           echo "Olá! ";
           echo "Até a próxima! <br>";
    }
    imprimirMenssagens();

    $var1 = 1;

    function alteraValor(){
        $var1 = 2;

        echo "Durante a function: $var1 <br>";
    }

    echo "Antes: $var1 <br>";
    alteraValor();
    echo "Depois: $var1 <br>";

    function alteraValorVariavel(){
        global $var1;
        $var1 = 3;
        echo "Durante: $var1 <br>";

    }
    echo "Antes: $var1 <br>";
    alteraValorVariavel();
    echo "Depois: $var1 <br>";
?>