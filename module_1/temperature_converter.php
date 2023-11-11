<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Temperature Converter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body style="text-align: center;">
    <h2>Temperature Converter</h2>
    <br>
    <form action="#" method="POST" style="font-size:18px;">
        <label for="temperature">Enter Temperature: </label><br>
        <input class="rounded" type="number" name="temperature" placeholder="90">
        <br><br>
        <input class="btn btn-sm bg-success text-white" type="submit" name="celcius" value="Celcius to Fahrenheit">
        <input class="btn btn-sm bg-success text-white" type="submit" name="fahrenheit" value="Fahrenheit to Celcius">
        <br>
    </form>
    
</body>
</html>

<?php
$input_temperature = $_POST["temperature"];
if (isset($_POST['celcius'])) {
    $result = ($input_temperature * 9/5) + 32;
    $result = round($result, 2);
    echo "<br> $input_temperature Degree Celcius = $result Degree Fahrenheit.";
}
elseif (isset($_POST['fahrenheit'])){
    $result = ($input_temperature - 32) * 5/9;
    $result = round($result, 2);
    echo "<br> $input_temperature Degree Fahrenheit = $result Degree Celcius.";
}
