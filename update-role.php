<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $roleId = $_POST['role-id'];
    $role_type = $_POST['role-type'];

    $sql1 = "UPDATE `role` SET `role_type`='$role_type' WHERE role_id = '$roleId'";

    if (mysqli_query($conn, $sql1)) {
        echo "<script>alert('Role Edit successfully!'); window.location.href = 'view-role.php';</script>";
    } else {
        echo "Category Not Found!: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>



<?php

include 'links.php';

?>
</head>

<?php
include 'header.php';
?>


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4 h-75 mb-5">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Edit Role </h2>
                            <?php
                            $role_id = $_GET['id'];
                            $sql = "SELECT * FROM role WHERE role_id = '$role_id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Role type</label>
                                    <input type="hidden"  name="role-id" class="form-control" id="exampleInputPassword1" value="<?php echo $row['role_id']?>">
                                    <input type="text" name="role-type" class="form-control" id="exampleInputPassword1" value="<?php echo $row['role_type']?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Role</button>
                            </form>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Form End -->


            <?php
include 'footer.php';
?>