<?php
require "assets/includes/db_connect.php";

$q = $_GET['q'];
$sql = "SELECT * FROM posted_jobs WHERE id = ?";
$stmt = mysqli_stmt_init($dbConnect);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $q);
$execute = mysqli_stmt_execute($stmt);

// 6. Get the result after we execute the query
$result = mysqli_stmt_get_result($stmt);

$number_of_rows = mysqli_num_rows($result);

// 7. Checking if the number of rows returned is not 1, when it is not 1, it means the account does not exist
if ($number_of_rows != 1) {
    echo "This job does not exist";
    die();
}

$job = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title><?php echo $job['title']; ?></title>

    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body style="background-image: url(assets/img/office.jpg);">
    <section>
        <?php include "assets/includes/nav.php" ?>
    </section>

    <section>
        <div class="container my-5">
            <div class="card">
                <h5 class="pt-3 card-header bg-white">
                    <?php echo $job['title']; ?>
                    <br>
                    <span class="d-block fs-6 mt-4">
                        Posted: <?php echo date("jS M. Y h:i a", strtotime($job['created_at'])); ?>
                    </span>
                    
                </h5>
                <div class="pt-3 card-header bg-white text-center">
                    <p class="p-1 d-inline px-2 text-white text-uppercase rounded <?php echo $job['job_status'] == 'available' ? 'bg-success' : 'bg-danger' ?>">
                        <?php echo $job['job_status'] ?>
                    </p>
                </div>

                <article class="card-body">
                    <?php echo $job['description']; ?>
                </article>
            </div>
        </div>
    </section>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
