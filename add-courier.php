<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'php_mailer/Exception.php';
require 'php_mailer/PHPMailer.php';
require 'php_mailer/SMTP.php';

include('db.php');


function generateTrackingNumber()
{
    return 'TRK-' . strtoupper(bin2hex(random_bytes(4))); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $tracking_number = generateTrackingNumber();

    $mail = new PHPMailer(true);

    try {
                
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'muneeb004hassan006@gmail.com';                     
        $mail->Password   = 'rhfl mehw gaqy hsqt';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        
        $mail->setFrom('muneeb004hassan006@gmail.com', 'Courier Service');
        $mail->addAddress($sender_email);     
        $mail->addAddress($receiver_email);               


        
        $mail->isHTML(true);                                  
        $mail->Subject = "Courier Details";
        $mail->Body    = "<h3>Courier Details</h3>
                        <p><b>Tracking Number:</b> $tracking_number</p>
                        <p><b>Sender Name:</b> $sender_name</p>
                        <p><b>Receiver Name:</b> $receiver_name</p>
                        <p><b>Status:</b> $courier_status</p>
                        <p><b>Description:</b> $courier_description</p>
                        <p><b>From Branch:</b> $from_branch</p>
                        <p><b>To Branch:</b> $to_branch</p>
                        <p><b>Delivery Date:</b> $delivery_date</p>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $sql = "INSERT INTO `courier`( `tracking_number`, `sender_name`, `sender_email`, `sender_address`, `sender_city`, `sender_country`, `receiver_name`, `receiver_email`, `receiver_address`, `receiver_city`, `receiver_country`, `courier_description`, `courier_status`, `from_branch`, `to_branch`, `width`, `height`, `lenght`, `weight`, `price`, `delivery_date`) VALUES ('$tracking_number','$sender_name','$sender_email','$sender_address','$sender_city','$sender_country','$receiver_name','$receiver_email','$receiver_address','$receiver_city','$receiver_country','$courier_description','$courier_status','$from_branch','$to_branch','$width','$height','$lenght','$weight','$price','$delivery_date')";

    if ($conn->query($sql) === TRUE) {
        header("Location: view-courier.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}



?>


<?php

include 'links.php';

?>
    <style>
        .form-label {
            display: block !important;
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

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Add New Courier</h2>
                            <hr>
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6  mb-3">
                                        <div class="row">
                                            <h5>Sender Information</h5>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Name</label>
                                                <input type="text" name="sender_name" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Email</label>
                                                <input type="email" name="sender_email" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Address</label>
                                                <textarea name="sender_address" required></textarea>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender City</label>
                                                <input type="text" name="sender_city" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Sender Country</label>
                                                <input type="text" name="sender_country" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6  mb-3">
                                        <div class="row">
                                            <h5>Receiver Information</h5>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Name</label>
                                                <input type="text" name="receiver_name" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Email</label>
                                                <input type="email" name="receiver_email" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Address</label>
                                                <textarea name="receiver_address" required></textarea>
                                            </div>
                                            <div class="col-sm- mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver City</label>
                                                <input type="text" name="receiver_city" required>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Receiver Country</label>
                                                <input type="text" name="receiver_country" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5>Courier Information</h5>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Courier Description</label>
                                        <input type="text" name="courier_description" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">status</label>
                                        <select name="courier_status" class="form-control">
                                            <option disabled>Please select her</option>
                                            <?php

                                            $sql3 = "SELECT * FROM `status`";
                                            $result3 = mysqli_query($conn, $sql3);

                                            if (mysqli_num_rows($result3) > 0) {
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                            ?>
                                                    <option value="<?php echo $row3['status_id'] ?>"><?php echo $row3['status_type'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Branch Processed</label>
                                        <select name="from_branch" class="form-control">
                                            <option>Please select her</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `branch`";
                                            $result1 = mysqli_query($conn, $sql1);

                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                            ?>
                                                    <option value="<?php echo $row1['branch_id'] ?>"><?php echo $row1['branch_name'] . " , " . $row1['branch_address'] . " , " . $row1['branch_city'] . " , " . $row1['branch_country'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Pickup Branch</label>
                                        <select name="to_branch" class="form-control">
                                            <option>Please select her</option>
                                            <?php

                                            $sql2 = "SELECT * FROM `branch`";
                                            $result2 = mysqli_query($conn, $sql2);

                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                            ?>
                                                    <option value="<?php echo $row2['branch_id'] ?>"><?php echo $row2['branch_name'] . " , " . $row2['branch_address'] . " , " . $row2['branch_city'] . " , " . $row2['branch_country'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Width</label>
                                                <input type="text" name="width" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Height</label>
                                                <input type="text" name="height" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Lenght</label>
                                                <input type="text" name="lenght" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleInputPassword1" class="form-label">Weight (Kg)</label>
                                                <input type="text" name="weight" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Price</label>
                                        <input type="text" name="price" required>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Delivery Data</label>
                                        <input type="date" name="delivery_date" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Courier</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>



            <?php
include 'footer.php';
?>