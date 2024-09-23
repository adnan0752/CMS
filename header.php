<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">COURIER</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                        <img class="rounded-circle" src="uploads-images/<?php echo $row5['profile_picture']?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['name']?></h6>
                        <span class="role-heading"><?php echo $row5['role_type']?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <?php
                    if ($_SESSION['role_id'] == 4) {
                        # code...
                    
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-address-card me-2"></i>Role</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-role.php" class="dropdown-item">Add Role</a>
                            <a href="view-role.php" class="dropdown-item">View Role</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user-tie me-2"></i>User</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-user.php" class="dropdown-item">Add User</a>
                            <a href="view-user.php" class="dropdown-item">View User</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-building me-2"></i>Branches</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-branch.php" class="dropdown-item">Add Branch</a>
                            <a href="view-branch.php" class="dropdown-item">View Branch</a>
                        </div>
                    </div>
                    <?php
                    if ($_SESSION['role_id'] == 4) {
                        # code...
                    
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-handshake me-2"></i>Agent</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-agent.php" class="dropdown-item">Add Agent</a>
                            <a href="view-agent.php" class="dropdown-item">View Agent</a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-boxes me-2"></i>Courier</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-courier.php" class="dropdown-item">Add Courier</a>
                            <a href="view-courier.php" class="dropdown-item">View Courier</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle" src="uploads-images/<?php echo $row5['profile_picture']?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['name']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->