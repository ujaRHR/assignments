<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body style="text-align: center;">
    <h2>Basic Calculator</h2>
    <br>
    <form action="#" method="POST" style="font-size: 18px;">
    <label for="number">First Number:</label>
        <input class="rounded" type="number" name="num1" required>
        <br>
        <label for="number">Second Number:</label>
        <input class="rounded" type="number" name="num2" required>
        <br><br>
        <label for="operation">Select operation:</label>
        <select name="operation" required>
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (*)</option>
            <option value="divide">Division (/)</option>
        </select>
        <br>
        <input class="btn btn-sm btn-primary" type="submit" name="calculate" value="Calculate">
    </form>
</body>
</html>

<?php
if (isset($_POST['calculate'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = 0;

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
                $result = round($result, 2);
            } else {
                echo "Division is not possible!";
            }
            break;
        }
        echo "The result is: $result";
    }
?>