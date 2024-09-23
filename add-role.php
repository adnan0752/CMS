<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $role_type = $_POST['role_type'];

    $sql = "INSERT INTO `role`( `role_type`) VALUES ('$role_type')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Role added successfully!'); window.location.href = 'view-role.php';</script>";
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
                            <h2 class="mb-4">Add New Role</h2>
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class=" mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Role type</label>
                                    <input type="text" name="role_type" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary">Add Role</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Form End -->


            <?php
include 'footer.php';
?>