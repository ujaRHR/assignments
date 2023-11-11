<?php

$current_temp = -12;

if($current_temp < 0){
    echo "It's freezing!";
} elseif($current_temp>=0 && $current_temp < 20){
    echo "It's cool.";   
} else{
    echo "It's warm.";
}