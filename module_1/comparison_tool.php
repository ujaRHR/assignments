<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Large Number Finder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body style="text-align: center;">
    <h2>Large Number Finder</h2>
    <br>
    <form action="#" method="POST" style="font-size: 18px;">
        <label for="number">First Number:</label>
        <input class="rounded" type="number" name="num1">
        <br>
        <label for="number">Second Number:</label>
        <input class="rounded" type="number" name="num2">
        <br><br>
        <input class="btn btn-sm bg-success text-white" type="submit" name="find" value="Find Now">
        <br>
    </form>
    
</body>
</html>

<?php
if (isset($_POST['find'])){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $large_number = ($num1 > $num2) ? $num1 : $num2;

    echo "<p>The larger number is: $large_number</p>";
}
?>
