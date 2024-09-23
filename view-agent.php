<?php

include 'links.php';

?>
<script>
    $(document).ready(function() {

        $("#datatable").dataTable();

    });
</script>
</head>

<body>
    <?php
    include 'header.php';
    ?>

    <div class="container-fluid pt-4 px-4" >
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Agent Details</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        include 'db.php';
                        $sql = "SELECT * FROM `agent` LEFT JOIN branch ON agent.agent_branch = branch.branch_id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        ?>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr style="background: #F95C19; color: #fff;">
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Branch</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                        <td scope="row"><?php echo $row['agent_id'] ?></td>
                                        <td><?php echo $row['agent_name'] ?></td>
                                        <td><?php echo $row['agent_contact'] ?></td>
                                        <td><?php echo $row['agent_address'] ?></td>
                                        <td><?php echo $row['agent_city'] ?></td>
                                        <td><?php echo $row['agent_state'] ?></td>
                                        <td><?php echo $row['agent_country'] ?></td>
                                        <td><?php echo $row['branch_name'] ?></td>
                                        <td><a href="update-agent.php?agentId=<?php echo $row['agent_id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a href="delete-agent.php?agentId=<?php echo $row['agent_id'] ?>"><i class="bi bi-trash-fill"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>