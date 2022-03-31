<div class="titulo">Argumento Padrão</div>

<?php 

    function saudacao($nome = 'Senhor(a)', $sobrenome = 'cliente'){
        return "Bem vindo, $nome $sobrenome! <br>";
    }

    echo saudacao();
    echo saudacao(NULL);
    echo saudacao(NULL, NULL);
    echo saudacao('Henrique', 'Schaffer')

?>