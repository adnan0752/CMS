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
<div class="container-fluid pt-4 px-4 h-75 mb-5">
    <div class="row g-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Branch Detail</h2>
                </div>
                <div class="card-body">
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM branch";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                    ?>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr style="background: #F95C19; color: #fff;">
                                    <th>Branch Id</th>
                                    <th>Branch Name</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip Code</th>
                                    <th>Country</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['branch_id'] ?></td>
                                        <td><?php echo $row['branch_name'] ?></td>
                                        <td><?php echo $row['branch_contact'] ?></td>
                                        <td><?php echo $row['branch_address'] ?></td>
                                        <td><?php echo $row['branch_city'] ?></td>
                                        <td><?php echo $row['branch_state'] ?></td>
                                        <td><?php echo $row['branch_zipcode'] ?></td>
                                        <td><?php echo $row['branch_country'] ?></td>
                                        <td><a href="update-branch.php?branchId=<?php echo $row['branch_id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="delete-branch.php?branchId=<?php echo $row['branch_id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
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

<?php
include 'footer.php';
?>