<?php
require "../assets/includes/db_connect.php";
require "../assets/includes/sessions.php";

auth_guard();
$id =  $_SESSION['active_user'];

$sql = "SELECT * FROM users WHERE id = '$id' ";
$query = mysqli_query($dbConnect, $sql);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Jobs </title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/offcanvas-navbar.css">
</head>

<body>
    <section>
        <?php include_once "../assets/includes/master-nav.php" ?>
    </section>


    <section>
        <div class="container">
            <div class="p-2">
                <?php error_msg();
                success_msg(); ?>
            </div>


            <div class="table-responsive">

                <h5 class="border-bottom my-4 h1">All Jobs</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM posted_jobs WHERE user_id = '$id'";
                            $query = mysqli_query($dbConnect, $sql);

                          while($row = mysqli_fetch_assoc($query)){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['created_at'] ?></th>
                                <td><?php echo $row['title'] ?></td>
                                <td>
                                    <p class="p-1 d-inline px-2 text-white text-uppercase rounded <?php echo $row['job_status'] == 'available' ? 'bg-success' : 'bg-danger' ?>">
                                        <?php echo $row['job_status'] ?>
                                    </p>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure?')" href="../app/delete_job?del=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="edit-job?q=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/offcanvas-navbar.js"></script>

</body>

</html>