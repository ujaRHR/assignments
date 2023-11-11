<?php
// Reajul Hasan Raju - Task 5

function generatePassword($length){
  $combination = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
  $password = "";

  for ($i = 0; $i < $length; $i++) {
    $random = rand(0, strlen($combination) - 1);
    $password .= $combination[$random];
  }
  return "Generated Password is $password";
}

echo generatePassword(16);

// zip -r <zip file name> <directory name>