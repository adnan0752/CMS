<?php

session_start();
include('db.php');

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id =  $_POST['user_id'];
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $role = $_POST['role'];



    $sql = "UPDATE `user` SET `name`='$name',`email`='$email' ,`role_id`='$role' WHERE user_id = '$user_id'";

    $result = mysqli_query($conn, $sql);

    header("Location: view-user.php");
}
