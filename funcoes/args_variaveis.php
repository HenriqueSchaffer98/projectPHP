<div class="titulo">Argumentos e Variáveis</div>

<?php

    function soma($a, $b){
        return $a + $b;
    }

    echo soma('14', '43') . '<br>';

    function somaCompleta(...$numeros){
        $soma = 0;
        foreach($numeros as $valor){
            $soma += $valor;
        }
        return $soma;
    }

    echo somaCompleta(1, 2, 4, 7) . '<br>';

    $array = [1, 4, 5, 6];

    echo somaCompleta(...$array) . '<br>';


?>
