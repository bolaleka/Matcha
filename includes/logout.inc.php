<?php
include "../config/database.php";
$conn = new PDO("mysql:host=$DB_DSN;dbname=Matcha", $DB_USER, $DB_PASSWORD);

date_default_timezone_set('Africa/Johannesburg');
$date = date('Y-m-d H:i:s');

session_start();
$sql = "UPDATE `status` SET `online`= 0, `offline`='{$date}' WHERE update_userId='{$_SESSION['userId']}' ";
$stmt = $conn->prepare($sql);
$stmt->execute();
session_unset();
session_destroy();

header("location: ../index.php");
 