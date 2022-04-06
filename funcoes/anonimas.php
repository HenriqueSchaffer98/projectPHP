<div class="titulo">Funções Anônimas</div>

<?php

$soma = function($a, $b){
    return $a + $b;
};

echo $soma(4, 5) . '<br>';

function executar($a, $b, $op, $funcao){

    $resultado = $funcao($a, $b);

    echo "$a $op $b = $resultado<br>";
}
executar(2, 3, '+', $soma);

?>


