<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Even/Odd Checker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body style="text-align: center;">
    <h2>Even/Odd</h2>
    <br>
    <form action="#" method="POST" style="font-size: 18px;">
        <h5>Enter Your Number: </h5><br>
        <input class="rounded" type="number" name="number" placeholder="35">
        <br><br>
        <input class="btn btn-sm bg-success text-white" type="submit" name="check" value="Check">
    </form>
    
</body>
</html>

<?php
if(isset($_POST['check'])){
    $input = $_POST['number'];
    if($input%2==0){
        echo "The Number $input is EVEN!";
    } else{
        echo "The Number $input is ODD!";
    }
}