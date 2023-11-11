<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Grade Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>
<body style="text-align: center;">
    <h2>Grade Calculator</h2>
    <br>
    <form action="#" method="POST" style="font-size: 18px;">
        <h5>Enter Your Marks: </h5><br>
        <label for="subject">Physics:</label>
        <input class="rounded" type="number" name="physics" placeholder="0-100">
        <br>
        <label for="subject">Mathematics:</label>
        <input class="rounded" type="number" name="mathematics" placeholder="0-100">
        <br>
        <label for="subject">Chemistry:</label>
        <input class="rounded" type="number" name="chemistry" placeholder="0-100">
        <br>
        <input class="btn btn-sm bg-success text-white" type="submit" name="calculate" value="Calculate GPA">
        <br>
    </form>
    
</body>
</html>

<?php
$physics = $_POST['physics'];
$mathematics = $_POST['mathematics'];
$chemistry = $_POST['chemistry'];

/*
80-100	A+
70-79	A
60-69	A-
50-59	B
40-49	C
33-39	D
0-32	F
*/

if (isset($_POST['calculate'])) {
    $total = $physics + $mathematics + $chemistry;
    $avg_marks = $total / 3;
    $avg_marks = round($avg_marks, 2);
    if ($avg_marks >= 80 && $avg_marks <= 100) {
        $grade = "A+";
    } elseif ($avg_marks >= 70 && $avg_marks < 80) {
        $grade = "A";
    } elseif ($avg_marks >= 60 && $avg_marks < 70) {
        $grade = "A-";
    } elseif ($avg_marks >= 50 && $avg_marks < 60) {
        $grade = "B";
    } elseif ($avg_marks >= 40 && $avg_marks < 50) {
        $grade = "C";
    } elseif ($avg_marks >= 33 && $avg_marks < 40) {
        $grade = "D";
    } else {
        $grade = "F";
    }

    echo "Average Marks: $avg_marks and the Grade is $grade";
}
?>