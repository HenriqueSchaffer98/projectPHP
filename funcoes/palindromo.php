<div class="titulo">Desafio Palíndromo</div>


<?php

function revertePalavra($palavra){

    $novaPalavra = strrev($palavra);
    
    if($novaPalavra == $palavra){
        return $palavra . ' Essa palavra é um palíndromo';
    } else {
        return $palavra . ' Essa palavra não é um palíndromo';
    }
}

echo revertePalavra('arara');
echo '<br>', revertePalavra('bola');
echo '<br>', revertePalavra('tenet');


?>