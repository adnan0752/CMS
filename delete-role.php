<?php

include 'db.php';

$role_id = $_GET['id'];

$sql = "DELETE FROM `role` WHERE role_id = '$role_id'";

$result = mysqli_query($conn, $sql);

header("Location: view-role.php");

mysqli_close($conn);

?>