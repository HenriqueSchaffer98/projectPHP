<div class="titulo">Data</div>

<?php


class Data {

    public $dia = 01;
    public $mes = 01;
    public $ano = 1970;

    public function apresentar(){
        echo 'A data é: ' . $this->dia . '/' . $this->mes . '/' . $this->ano;
    }

}

$aniversario = new Data;
$aniversario->dia = 22;
$aniversario->mes = 07;
$aniversario->ano = 1998;
$aniversario->apresentar();