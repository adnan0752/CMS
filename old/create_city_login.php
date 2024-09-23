<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city = $_POST['city'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO city_logins (city, username, password_hash) VALUES ('$city', '$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Successful";
    }
}
?>

<form method="POST">
    City: <input type="text" name="city" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Create Login">
</form>
