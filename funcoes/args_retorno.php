<div class="titulo">Argumentos e Retornos</div>

<?php

    function obterMenssagens(){
        return 'Seja bem vindo!';
    }

    obterMenssagens();

    $menssagem = obterMenssagens();

    echo $menssagem;
    echo '<br>';
    var_dump(obterMenssagens());

    function obterMenssagemComNome($nome){
        return "Bem vindo, {$nome}!";
    }

    echo '<br>', obterMenssagemComNome('Henrique');
    echo '<br>', obterMenssagemComNome('Root');

    function soma($a, $b){
        return $a + $b;
    }

    echo '<br>', soma(5, 5);
    $x = 20;
    $y = 34;

    echo '<br> A soma dos numeros é: ', soma($x, $y);

    function trocaValor($a, $novoValor){
        $a = $novoValor;
    }

    $var = 1;
    trocaValor($var, 5);
    echo '<br>', $var;

    function trocaValorDeVerdade(&$a, $novoValor){ //Utilizando o & você referencia o valor da memória sendo assim consegue modificar o valor.
        $a = $novoValor;
    }

    trocaValorDeVerdade($var, 5);
    echo '<br>', $var;

?>