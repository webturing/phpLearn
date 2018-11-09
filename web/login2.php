<?php
$name = $_POST["name"];
$password = $_POST["password"];
echo $name . " " . $password;
if ($name == "admin" && $password = "123456")
    echo "Welcome";
else
    echo "Sorry";
?>

