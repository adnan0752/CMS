<?php

include 'db.php';

$courier_id = $_GET['courier_id'];

$sql = "DELETE FROM `courier` WHERE courier_id  = '{$courier_id}'";
$result = mysqli_query($conn, $sql);

header("Location: view-courier.php");

mysqli_close($conn);

?>