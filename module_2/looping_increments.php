<?php
// Reajul Hasan Raju

// Function - for loop
function evenNumbersForLoop($start, $end, $step) {
    for ($i = $start; $i <= $end; $i += $step) {
        if ($i % 2 == 0) {
            echo $i . " ";
        }
    }
}

// Function - while loop
function evenNumbersWhileLoop($start, $end, $step) {
    $current = $start;
    while ($current <= $end) {
        if ($current % 2 == 0) {
            echo $current . " ";
        }
        $current += $step;
    }
}

// Function - do while loop
function evenNumbersDoWhileLoop($start, $end, $step) {
    $current = $start;
    do {
        if ($current % 2 == 0) {
            echo $current . " ";
        }
        $current += $step;
    } while ($current <= $end);
}


// Function Calling
echo "For Loop: ";
evenNumbersForLoop(1, 20, 2);

echo "\n";

echo "While Loop: ";
evenNumbersWhileLoop(1, 20, 2);

echo "\n";

echo "do-while Loop: ";
evenNumbersDoWhileLoop(1, 20, 2);

?>