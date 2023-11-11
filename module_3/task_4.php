<?php
// Reajul Hasan Raju - Task 4

$studentGrades = array(
    'Mohammad Arif' => array(80, 75, 78),
    'Jakir Hossain' => array(85, 82, 95),
    'Rafiq Mazumdar' => array(75, 90, 82)
);

function averageGrades($studentGrades) {
    foreach ($studentGrades as $student => $grades) {
        $average = array_sum($grades) / count($grades);
        echo "Average Grade for {$student}: " . number_format($average, 2) . "\n";
    }
}

averageGrades($studentGrades);