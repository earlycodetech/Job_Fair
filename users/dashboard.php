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
                <img src="../assets/uploads/<?php echo $row['avatar'].'?'.mt_rand(); ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item">Full Name: <?php echo $row['full_name'] ?> </li>
                        <li class="list-group-item">Email: <?php echo $row['email'] ?></li>
                        <li class="list-group-item">Gender:  <?php echo $row['gender'] ?></li>
                        <li class="list-group-item">Address: <?php echo $row['address'] ?></li>
                        <li class="list-group-item">Job Description: <?php echo $row['job'] ?></li>
                        <li class="list-group-item">State: <?php echo $row['state'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/offcanvas-navbar.js"></script>
</body>

</html>