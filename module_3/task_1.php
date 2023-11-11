<?php
// Reajul Hasan Raju - Task 1

$text = "The quick brown fox jumps over the lazy dog.";

function convertCase($text){
  $convertedText = strtolower($text);
  $modifiedText = str_replace('brown', 'red', $convertedText);
  echo $modifiedText;
}

convertCase($text);