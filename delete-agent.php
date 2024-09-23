<?php

include 'db.php';

$agentId = $_GET['agentId'];

$sql = "DELETE FROM `agent` WHERE agent_id  = '{$agentId}'";
$result = mysqli_query($conn, $sql);

header("Location: view-agent.php");

mysqli_close($conn);

?>