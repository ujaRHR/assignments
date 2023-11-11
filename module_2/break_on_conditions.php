<?php
// Reajul Hasan Raju

$first = 0;
$second = 1;
$count = 0;

while ($count < 10) {
    if ($first > 100) {
        break;
    }

    echo $first . " ";

    $next = $first + $second;
    $first = $second;
    $second = $next;

    $count++;
}
?>