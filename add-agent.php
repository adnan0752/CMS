<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agent_name =  $_POST['agent_name'];
    $agent_contact = $_POST['agent_contact'];
    $agent_address = $_POST['agent_address'];
    $agent_city = $_POST['agent_city'];
    $agent_state = $_POST['agent_state'];
    $agent_country = $_POST['agent_country'];
    $agent_branch = $_POST['agent_branch'];
    

    $sql = "INSERT INTO `agent`(`agent_name`, `agent_contact`, `agent_address`, `agent_city`, `agent_state`, `agent_country`, `agent_branch`) VALUES ('$agent_name','$agent_contact','$agent_address','$agent_city','$agent_state','$agent_country','$agent_branch')";

    $result = mysqli_query($conn, $sql);

    header("Location: view-agent.php");

    
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
        select {
            width: 100% !important;
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
                            <h2 class="mb-4">Add New Agent</h2>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6  mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Name</label>
                                        <input type="text" name="agent_name" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Contact No</label>
                                        <input type="text" name="agent_contact" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Address</label>
                                        <input type="text" name="agent_address" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <label for="exampleInputPassword1" class="form-label">City</label>
                                        <input type="text" name="agent_city" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <label for="exampleInputPassword1" class="form-label">State</label>
                                        <input type="text" name="agent_state" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <label for="exampleInputPassword1" class="form-label">country</label>
                                        <input type="text" name="agent_country" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Branch</label>
                                        <select name="agent_branch" class="form-control">
                                            <option> Select Branch</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `branch`";
                                            $result1 = mysqli_query($conn, $sql1);

                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row = mysqli_fetch_assoc($result1)) {
                                            ?>
                                                    <option value="<?php echo $row['branch_id'] ?>"><?php echo $row['branch_name'] . " , " . $row['branch_address'] . " , " . $row['branch_city'] . " , " . $row['branch_country'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    
                                </div>

                                <button type="submit" class="btn btn-primary">Add Agent</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Form End -->


           <?php
           include 'footer.php';
           ?>