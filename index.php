<?php
include 'db.php';


$status_counts = [
    'Pending' => 0,
    'Out Of Delivery' => 0,
    'Delivered' => 0,
];


$branch_counts = 0;
$agent_counts = 0;


$status_query = "
    SELECT 
        CASE 
            WHEN status_type = 'Out Of Delivery' THEN 'Out Of Delivery'
            WHEN status_type = 'Pending' THEN 'Pending'
            WHEN status_type = 'Delivered' THEN 'Delivered'
        END as status_type, 
        COUNT(*) as count 
    FROM courier
    JOIN status ON courier.courier_status = status.status_id
    GROUP BY status_type
";

$status_result = mysqli_query($conn, $status_query);

while ($row = mysqli_fetch_assoc($status_result)) {
    $status_counts[$row['status_type']] = $row['count'];
}


$branch_query = "
    SELECT 
        COUNT(DISTINCT branch_id) as branch_count 
    FROM branch
";

$branch_result = mysqli_query($conn, $branch_query);

if ($branch_row = mysqli_fetch_assoc($branch_result)) {
    $branch_counts = $branch_row['branch_count'];
}

$agent_query = "
    SELECT 
        COUNT(DISTINCT agent_id) as agent_count 
    FROM agent
";

$agent_result = mysqli_query($conn, $agent_query);

if ($agent_row = mysqli_fetch_assoc($agent_result)) {
    $agent_counts = $agent_row['agent_count'];
}
?>

<?php

include 'links.php';

?>
<style>
    .status-row {
    display: flex !important;
    gap: 50px !important;
}

.status-box {
    box-sizing: border-box !important;
    border: 2px solid black !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 1vw;
    padding: 20px 0px !important;
}

.role-heading {
    text-transform: capitalize !important;
}
</style>

</head>

<?php
include 'header.php';
?>


<div class="container-fluid pt-4 px-4 h-75 mb-5">
    <div class="row  g-4">
        <div class="col-12">
            <h2 class="role-heading"><?php echo $row5['role_type'] ?> Dashboard</h2>
        </div>
        <div class="row status-row mt-5">
            <div class="col-sm-5 col-md-3 mb-4 status-box">
                <h4>Pending</h4>
                <h4><?php echo $status_counts['Pending']; ?></h4>
            </div>
            <div class="col-sm-5 col-md-3 mb-4 status-box">
                <h4>Out Of Delivery</h4>
                <h4><?php echo $status_counts['Out Of Delivery']; ?></h4>
            </div>
            <div class="col-sm-5 col-md-3 mb-4 status-box">
                <h4>Delivered</h4>
                <h4><?php echo $status_counts['Delivered']; ?></h4>
            </div>
            <div class="col-sm-5 col-md-3 mb-4 status-box">
                <h4>Branches</h4>
                <h4><?php echo $branch_counts; ?></h4>
            </div>
            <?php
            if ($_SESSION['role_id'] == 4) {
            ?>
                <div class="col-sm-5 col-md-3 mb-4 status-box">
                    <h4>Agents</h4>
                    <h4><?php echo $agent_counts; ?></h4>
                </div>
            <?php
            }
            ?>
        </div>


    </div>
</div>


<?php
include 'footer.php';
?>