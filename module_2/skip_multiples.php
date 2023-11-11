<?php
// Reajul Hasan Raju

for ($number = 1; $number <= 50; $number++) {
    if ($number % 5 == 0) {
        continue;
    }
    echo $number . " ";
}
?>