<div class="titulo">Interface</div>

<?php

interface Animal {
    function respirar();
}
interface Canino {
    function latir(): string;
}
class Cachorro implements Animal {
    function respirar()
    {
        echo "Irei Respirar <br>";
    }
    function latir(): string{
        return 'Au Au';
    }
}

$animal1 = new Cachorro();
$animal1->respirar();
$animal1->latir ();

echo "Fim! <br>";