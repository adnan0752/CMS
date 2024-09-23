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
                    <h2>View Roles</h2>
                </div>
                <div class="card-body">
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM role";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result)) {
                    ?>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr style="background: #F95C19; color: #fff;">
                                    <th>Role Id</th>
                                    <th>Role Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $_SESSION['role_type'] = $row['role_type'];
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['role_id'] ?></th>
                                        <td><?php echo $row['role_type'] ?></td>
                                        <td><a href="update-role.php?id=<?php echo $row['role_id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="delete-role.php?id=<?php echo $row['role_id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
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