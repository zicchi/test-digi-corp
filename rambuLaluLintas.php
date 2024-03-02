<?php 

function rambuLaluLintas() {
    $colors = ['merah','kuning','hijau'];

    while (true) {
        foreach ($colors as $color) {
            yield $color;
        }
    }
}

$generator = rambuLaluLintas();

for ($i=0; $i < 10 ; $i++) { 
    echo $generator->current().'<br>';
    $generator->next();
}