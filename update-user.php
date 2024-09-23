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
                    <div class="col-12 mb-5">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-lg-5 mb-sm-0">Update User Details</h2>
                            <?php
                            include 'db.php';
                            $userId = $_GET['user_id'];
                            $sql = "SELECT user.user_id, user.name, user.email, user.password, user.profile_picture, user.role_id,  role.role_type FROM user LEFT JOIN role ON user.role_id = role.role_id WHERE user.user_id = '{$userId}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                
                            ?>
                            <form action="save-update-user.php" method="POST"  enctype="multipart/form-data">
                                <div class="row mb-lg-3 mb-sm-0">
                                    <div class="col-sm-12 col-md-8 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Name</label>
                                        <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>"  required>
                                        <input type="text" name="name" value="<?php echo $row['name'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-8 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Email</label>
                                        <input type="email" name="email" value="<?php echo $row['email'] ?>" required>
                                    </div>
                                    <div class="col-sm-12 col-md-8 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Role</label>
                                        <select name="role" class="form-control">
                                            <option disabled> Select Role</option>
                                            <?php

                                            $sql1 = "SELECT * FROM `role`";
                                            $result1 = mysqli_query($conn, $sql1);

                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                    if ($row['role_id'] == $row1['role_id']) {
                                                        $selected = "selected";
                                                    }else {
                                                        $selected = "";
                                                    }
                                                   echo" <option {$selected} value='{$row1['role_id']}'>{$row1['role_type']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update User</button>
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