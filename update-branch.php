<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branch_id = $_POST['branch_id'];
    $branch_name = $_POST['branch_name'];
    $branch_contact = $_POST['branch_contact'];
    $branch_address = $_POST['branch_address'];
    $branch_city = $_POST['branch_city'];
    $branch_state= $_POST['branch_state'];
    $branch_zipcode = $_POST['branch_zipcode'];
    $branch_country = $_POST['branch_country'];

    $sql = "UPDATE `branch` SET `branch_name`='$branch_name',`branch_contact`='$branch_contact',`branch_address`='$branch_address',`branch_city`='$branch_city',`branch_state`='$branch_state',`branch_zipcode`='$branch_zipcode',`branch_country`='$branch_country' WHERE branch_id = '$branch_id'";

    $result = mysqli_query($conn, $sql);

    header("Location: view-branch.php");

    mysqli_close($conn);
    
}
?>


<?php

include 'links.php';

?>
    <style>
        .form-label {
            display: block !important;
            font-size: 20px;
        }

        input,
        textarea {
            width: 100% !important;
        }

        input {
            padding: 10px 5px !important;
        }

    </style>
</head>

<?php
include 'header.php';
?>


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4 h-75 mb-5">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Update Branch Details</h2>
                            <?php

                            $branchId = $_GET['branchId'];

                            $sql = "SELECT * FROM branch WHERE branch_id = '$branchId'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6  mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Branch Name</label>
                                        <input type="hidden" name="branch_id" value="<?php echo $row['branch_id'] ?>" required>
                                        <input type="text" name="branch_name" value="<?php echo $row['branch_name'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Contact</label>
                                        <input type="text" name="branch_contact" value="<?php echo $row['branch_contact'] ?>"  required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Address</label>
                                        <input type="text" name="branch_address" value="<?php echo $row['branch_address'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">City</label>
                                        <input type="text" name="branch_city" value="<?php echo $row['branch_city'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">State</label>
                                        <input type="text" name="branch_state" value="<?php echo $row['branch_state'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Zip Code</label>
                                        <input type="text" name="branch_zipcode" value="<?php echo $row['branch_zipcode'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Country</label>
                                        <input type="text" name="branch_country" value="<?php echo $row['branch_country'] ?>" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Branch</button>
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