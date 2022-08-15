<?php namespace contexto; ?>


<div class="titulo">Exemplo Básico</div>

<?php

echo __NAMESPACE__ . '<br>';

const constante1 = 123;

define('contexto\constante2', 213);

define(__NAMESPACE__ . '\constante3', 143);

define('outro_namespace\constante4', 567);

echo constante1 . '<br>';
echo constante2 . '<br>';