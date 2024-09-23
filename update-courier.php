<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courier_id = $_POST['courier_id'];
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $sender_address = $_POST['sender_address'];
    $sender_city = $_POST['sender_city'];
    $sender_country = $_POST['sender_country'];
    $receiver_name = $_POST['receiver_name'];
    $receiver_email = $_POST['receiver_email'];
    $receiver_address = $_POST['receiver_address'];
    $receiver_city = $_POST['receiver_city'];
    $receiver_country = $_POST['receiver_country'];
    $courier_description = $_POST['courier_description'];
    $courier_status = $_POST['courier_status'];
    $from_branch = $_POST['from_branch'];
    $to_branch = $_POST['to_branch'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $lenght = $_POST['lenght'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    $delivery_date = $_POST['delivery_date'];

    $sql4 = "UPDATE `courier` SET `sender_name`='$sender_name',`sender_email`='$sender_email',`sender_address`='$sender_address',`sender_city`='$sender_city',`sender_country`='$sender_country',`receiver_name`='$receiver_name',`receiver_email`='$receiver_email',`receiver_address`='$receiver_address',`receiver_city`='$receiver_city',`receiver_country`='$receiver_country',`courier_description`='$courier_description',`courier_status`='$courier_status',`from_branch`='$from_branch',`to_branch`='$to_branch',`width`='$width',`height`='$height',`lenght`='$lenght',`weight`='$weight',`price`='$price',`delivery_date`='$delivery_date' WHERE courier_id = '$courier_id'";

    $result4 = mysqli_query($conn, $sql4);

    header("Location: view-courier.php");
    
    






   
}



?>


<?php

include 'links.php';

?>
    <style>
        .form-label {
            display: block !important;
            /* font-size: 20px; */
        }

        input,
        textarea {
            width: 100% !important;
        }

        input {
            padding: 8px 5px !important;
        }
    </style>
</head>

<?php
include 'header.php';
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Update Courier Details</h2>
                            <hr>
                            <?php
                             $courier_Id = $_GET['courier_id'];
                             $sql1 = "SELECT * FROM courier WHERE courier_id = '$courier_Id'";
                             $result1 = mysqli_query($conn, $sql1);
                             if (mysqli_num_rows($result1)) {
                                 while ($row1 = mysqli_fetch_assoc($result1)) {
 
                             ?>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6  mb-3">
                                        <div class="row">
                                            <h5>Sender Information</h5>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Name</label>
                                                <input type="hidden" name="courier_id" value="<?php echo $row1['courier_id']?>" required>
                                                <input type="text" name="sender_name" value="<?php echo $row1['sender_name']?>" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Email</label>
                                                <input type="email" name="sender_email" value="<?php echo $row1['sender_email']?>" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Address</label>
                                                <textarea name="sender_address"  required><?php echo $row1['sender_address']?></textarea>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender City</label>
                                                <input type="text" name="sender_city" value="<?php echo $row1['sender_city']?>" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Country</label>
                                                <input type="text" name="sender_country" value="<?php echo $row1['sender_country']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6  mb-3">
                                        <div class="row">
                                            <h5>Receiver Information</h5>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Name</label>
                                                <input type="text" name="receiver_name" value="<?php echo $row1['receiver_name']?>" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Email</label>
                                                <input type="email" name="receiver_email" value="<?php echo $row1['receiver_email']?>" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Address</label>
                                                <textarea name="receiver_address" required><?php echo $row1['receiver_address']?></textarea>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver City</label>
                                                <input type="text" name="receiver_city" value="<?php echo $row1['receiver_city']?>" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Country</label>
                                                <input type="text" name="receiver_country" value="<?php echo $row1['receiver_country']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Courier Information</h5>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Courier Description</label>
                                        <input type="text" name="courier_description" value="<?php echo $row1['courier_description']?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Status</label>
                                        <select name="courier_status" class="form-control">
                                            <option disabled>Please select here</option>
                                            <?php

                                            $sql3 = "SELECT * FROM `status`";
                                            $result3 = mysqli_query($conn, $sql3);

                                            if (mysqli_num_rows($result3) > 0) {
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    if ($row1['courier_status'] == $row3['status_id']) {
                                                        $selected = "selected";
                                                    }else {
                                                        $selected = "";
                                                    }
                                                   echo" <option {$selected} value='{$row3['status_id']}'>{$row3['status_type']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Branch</label>
                                        <select name="from_branch" class="form-control">
                                            <option disabled> Please select here </option>
                                            <?php

                                            $sql2 = "SELECT * FROM `branch`";
                                            $result2 = mysqli_query($conn, $sql2);

                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    if ($row1['from_branch'] == $row2['branch_id']) {
                                                        $selected = "selected";
                                                    }else {
                                                        $selected = "";
                                                    }
                                                   echo" <option {$selected} value='{$row2['branch_id']}'>{$row2['branch_name']} {$row2['branch_address']} {$row2['branch_city']} {$row2['branch_country']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Pickup Branch</label>
                                        <select name="to_branch" class="form-control">
                                        <option disabled> Please select here</option>
                                            <?php

                                            $sql2 = "SELECT * FROM `branch`";
                                            $result2 = mysqli_query($conn, $sql2);

                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    if ($row1['to_branch'] == $row2['branch_id']) {
                                                        $selected = "selected";
                                                    }else {
                                                        $selected = "";
                                                    }
                                                   echo" <option {$selected} value='{$row2['branch_id']}'>{$row2['branch_name']} {$row2['branch_address']} {$row2['branch_city']} {$row2['branch_country']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Width</label>
                                                <input type="text" name="width" value="<?php echo $row1['width']?>" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Height</label>
                                                <input type="text" name="height" value="<?php echo $row1['height']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Lenght</label>
                                                <input type="text" name="lenght" value="<?php echo $row1['lenght']?>" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Weight (Kg)</label>
                                                <input type="text" name="weight" value="<?php echo $row1['weight']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Price</label>
                                        <input type="text" name="price" value="<?php echo $row1['price']?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Delivery Data</label>
                                        <input type="date" name="delivery_date" value="<?php echo $row1['delivery_date']?>" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Courier</button>
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