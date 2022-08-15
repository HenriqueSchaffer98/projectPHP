<div class="titulo">Try && Catch</div>


<?php

try {

    echo intdiv(7, 0);

} catch (Error $e){
    echo 'Ocorreu um erro. <br>';
}


try {
     throw new Exception('Um erro muito estranho aconteceu!'); // Lança uma menssagem de erro.

     echo intdiv(7, 0);

} catch (DivisionByZeroError $e){ // Tratamento específico em divisões por zero.
    echo 'Divisão por zero <br>';
} catch (Throwable $e){
    echo 'Erro encontrado: ' . $e->getMessage() . '<br>'; // o getMessage irá retornar o erro lançado no throw new Exception.
} finally {
    echo 'Sempre executado! <br>';
}