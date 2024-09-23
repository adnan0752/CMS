<?php
include 'links.php';
?>
    <script>
        $(document).ready(function() {

            $("#datatable").dataTable();

        });
    </script>
</head>

<?php
include 'header.php';
?>
<div class="table-container container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Courier Details</h2>
                </div>
                <div class="card-body">
                    <?php
                   include 'db.php';
                   $sql = "SELECT * FROM courier  LEFT JOIN status ON courier.courier_status = status.status_id";
                   $result = mysqli_query($conn, $sql);
                   if (mysqli_num_rows($result)) {
                    ?>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr style="background: #F95C19; color: #fff;">
                                <th>Id</th>
                                        <th>Tracking Number</th>
                                        <th>Sender Name</th>
                                        <th>Receiver Name</th>
                                        <th>Courier Status</th>
                                        <th>Delivery Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                    <th scope="row"><?php echo $row['courier_id'] ?></th>
                                            <th scope="row"><?php echo $row['tracking_number'] ?></th>
                                            <td><?php echo $row['sender_name'] ?></td>
                                            <td><?php echo $row['receiver_name'] ?></td>
                                            <td><?php echo $row['status_type'] ?></td>
                                            <td><?php echo $row['delivery_date'] ?></td>
                                    <td><a href="update-courier.php?courier_id=<?php echo $row['courier_id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a href="delete-courier.php?courier_id=<?php echo $row['courier_id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>