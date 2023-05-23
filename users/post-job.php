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
    <title>Profile  </title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/offcanvas-navbar.css">
</head>

<body>
    <section>
        <?php include_once "../assets/includes/master-nav.php" ?>
    </section>


    <section>
        <div class="container">
            <div class="card my-3">
                <div class="card-header bg-light">
                    <h5>Post a Job</h5>
                </div>
                <div class="card-body">
                    <label for="">Job Title</label>
                    <input type="text" name="title"  class="form-control mb-3">

                    <textarea name="" class="form-control"></textarea>

                    <div class="my-3">
                        <button class="btn btn-success">
                            Post Job
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/offcanvas-navbar.js"></script>
</body>

</html>