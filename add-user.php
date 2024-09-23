<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $file_name = $_FILES['profile_picture']['name'];
    $file_tmp = $_FILES['profile_picture']['tmp_name'];
    $file_type = $_FILES['profile_picture']['type'];
    $file_size = $_FILES['profile_picture']['size'];

    $upload_dir = "uploads-images/";

    if (!empty($file_name)) {
        if ($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg") {
            if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                $profile_picture = $file_name;
            } else {
                echo "<script>alert('Error uploading image');</script>";
                exit();
            }
        } else {
            echo "<script>alert('Invalid image format');</script>";
            exit();
        }
    } else {
        $profile_picture = "";
    }


    // Prepare the SQL statement
    $sql = "INSERT INTO user (name, email, password, profile_picture, role_id) VALUES ('$name', '$email', '$hashed_password', '$profile_picture', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Successfull'); window.location.href='view-user.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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

    .footer {
        position: fixed !important;
        bottom: 0px !important;
    }

    @media (max-width: 780px) {
        .footer {
            position: relative !important;
        }
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
                <h2 class="mb-4">Add New User</h2>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Name</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Role</label>
                            <select name="role" class="form-control">
                                <option> Select Role</option>
                                <?php

                                $sql1 = "SELECT * FROM `role`";
                                $result1 = mysqli_query($conn, $sql1);

                                if (mysqli_num_rows($result1) > 0) {
                                    while ($row = mysqli_fetch_assoc($result1)) {
                                ?>
                                        <option value="<?php echo $row['role_id'] ?>"><?php echo $row['role_type'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <label for="exampleInputPassword1" class="form-label">Profile Picture</label>
                            <input type="file" name="profile_picture" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->


<?php
include 'footer.php';
?>