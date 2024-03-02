<?php 

$numbers = [5,1,6,10,2];

function secondMax($numbers){
    rsort($numbers);
    return $numbers[1];
}

echo secondMax($numbers);