<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agent_name = $_POST['agent_name'];
    $from_location = $_POST['from_location'];
    $to_location = $_POST['to_location'];
    $city = $_POST['city'];

    $sql = "INSERT INTO agents (agent_name, from_location, to_location, city) VALUES ('$agent_name', '$from_location', '$to_location', '$city')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Successfull";
    }
}
?>

<form method="POST">
    Agent Name: <input type="text" name="agent_name" required><br>
    From Location: <input type="text" name="from_location" required><br>
    To Location: <input type="text" name="to_location" required><br>
    City: <input type="text" name="city" required><br>
    <input type="submit" value="Add Agent">
</form>
