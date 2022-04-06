<div class="titulo">Map & Filter</div>


<?php

    $notas = [5.8, 7.3, 9.8, 6.7];

    $notasFinais = [];

    foreach($notas as $nota){
        
        $notasFinais[] = round($nota);

    }

    print_r($notasFinais);

    echo '<br>';

    $notasFinais2 = array_map(round, $notas);
    print_r($notasFinais2);

    echo '<br>';

    

?>