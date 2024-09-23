<?php

include 'db.php';

$user_id = $_GET['user_id'];

$sql = "DELETE FROM `user` WHERE user_id  = '{$user_id}'";
$result = mysqli_query($conn, $sql);

header("Location: view-user.php");

mysqli_close($conn);

?>