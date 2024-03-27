<?php

$name = $_POST['name'];
$icon = $_POST['icon'];
$ingredients = $_POST['ingredients'];
$how_to_make = $_POST['how-to-make'];

$server = "localhost";
$username = "root";
$password = "";
$dbname = "konserwa";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$sql = "INSERT INTO przepisy(tytul, ikona, skladniki, jak_zrobic) VALUES ('$name', '$icon', '$ingredients', '$how_to_make');";
$conn->query($sql);

$conn->close();

header("Location: http://localhost/sieraczan/przepisy/index.php");