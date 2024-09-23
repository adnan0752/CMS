<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branch_name = $_POST['branch_name'];
    $branch_contact = $_POST['branch_contact'];
    $branch_address = $_POST['branch_address'];
    $branch_city = $_POST['branch_city'];
    $branch_state= $_POST['branch_state'];
    $branch_zipcode = $_POST['branch_zipcode'];
    $branch_country = $_POST['branch_country'];

    $sql = "INSERT INTO `branch`(`branch_name`, `branch_contact`, `branch_address`, `branch_city`, `branch_state`, `branch_zipcode`, `branch_country`) VALUES ('$branch_name','$branch_contact','$branch_address','$branch_city','$branch_state','$branch_zipcode','$branch_country')";

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
                            <h2 class="mb-4">Add New Branch</h2>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6  mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Branch Name</label>
                                        <input type="text" name="branch_name" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Contact</label>
                                        <input type="text" name="branch_contact" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Address</label>
                                        <input type="text" name="branch_address" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">City</label>
                                        <input type="text" name="branch_city" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">State</label>
                                        <input type="text" name="branch_state" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Zip Code</label>
                                        <input type="text" name="branch_zipcode" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Country</label>
                                        <input type="text" name="branch_country" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Branch</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Form End -->


            <?php
           include 'footer.php';
           ?>