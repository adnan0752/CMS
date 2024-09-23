<?php

include 'db.php';

$branchId = $_GET['branchId'];

$sql = "DELETE FROM `branch` WHERE branch_id  = '{$branchId}'";
$result = mysqli_query($conn, $sql);

header("Location: view-branch.php");

mysqli_close($conn);

?>