<?php
// Reajul Hasan Raju - Task 3

$grades = [85, 92, 78, 88, 95];

function arraySorting($grades){
  rsort($grades);
  print_r($grades);
}

arraySorting($grades);