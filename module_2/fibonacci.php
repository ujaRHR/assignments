<?php
// Reajul Hasan Raju

function showFibonacci($count) {
    $first = 0;
    $second = 1;

    for ($number = 0; $number < $count; $number++) {
        echo $first . " ";
        $next = $first + $second;
        $first = $second;
        $second = $next;
    }
}


showFibonacci(15);
?>
