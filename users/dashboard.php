<?php
require "../assets/includes/sessions.php";

auth_guard();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/offcanvas-navbar.css">
</head>

<body>
    <section>
        <?php include_once "../assets/includes/master-nav.php" ?>
    </section>


    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 mb-3">
                    <img src="../assets/img/about5.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item">Full Name: </li>
                        <li class="list-group-item">Email: </li>
                        <li class="list-group-item">Gender: </li>
                        <li class="list-group-item">Address: </li>
                        <li class="list-group-item">Job Description: </li>
                        <li class="list-group-item">State: </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/offcanvas-navbar.js"></script>
</body>

</html>