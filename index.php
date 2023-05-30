<?php
require "assets/includes/db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="ke" content="">
    <title>Job Fair ~ Everybody must work</title>

    <link rel="shortcut icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <section>
        <?php include "assets/includes/nav.php" ?>
    </section>


    <section>
        <div class="container-fluid vh-100 hero-bg d-flex justify-content-center align-items-center">
            <div class="fs-1 fw-bold text-center">
                <p class="text-white">Welcome to Job Fair <br> Where Everybody must work</p>

                <a href="#" class="btn btn-outline-light">Create an Account Now</a>
                <a href="#" class="btn btn-outline-info">Sign In</a>
            </div>
        </div>
    </section>

    <section>
        <a href="" class="text-decoration-none apply">
            <h1 class="text-center fw-bolder fs-1 text-dark-50">
                Apply For Jobs Here
            </h1>
        </a>
        <div class="container-fluid py-5 hero-two-bg">

            <div class="suggest">
                <div class="row my-5">
                    <?php
                    $sql = "SELECT * FROM posted_jobs ORDER BY id DESC";
                    $query = mysqli_query($dbConnect, $sql);
                    while ($job = mysqli_fetch_assoc($query)) {
                    ?>
                        <div class="col-md-4 mb-3 hover">
                            <a href="job-description?q=<?php echo $job['id']; ?>" class="text-decoration-none text-white p-2 text-uppercase fw-bolder fs-4 ms-3 d-flex align-items-center justify-content-center linl" style="background-image: url(assets/img/acct.jpg); background-size: cover; height: 250px;">
                               <?php echo $job['title']; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="btm-pg container-fluid bg-dark">
            <div class="row ms-5">
                <div class="col-md-4 col-sm-6 col-12">
                    <p class="text-white fs-3 border border-5 border-white w-50 text-center mt-3">
                        Jobs
                    </p>
                    <ul class="fs-6 text-capitalize" style="list-style: none; color: white; ">
                        <li>job bonuses</li>
                        <li>salary jobs</li>
                        <li>earn as you work jobs</li>
                        <li>discounted jobs</li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <p class="text-white fs-3 border border-5 border-white w-50 text-center mt-3">
                        Affiliates
                    </p>
                    <ul class="fs-6 text-capitalize" style="list-style: none; color: white; ">
                        <li>JobSect</li>
                        <li>Jobberman</li>
                        <li>JobFest</li>
                        <li>Jobbery</li>
                        <li>JobFinder</li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <p class="text-white fs-3 border border-5 border-white w-50 text-center mt-3">
                        Contact Us
                    </p>
                    <ul class="fs-6 text-capitalize" style="list-style: none; color: white; ">
                        <li>Address:</li>
                        <li>Phone Number</li>
                        <li>Email Address</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>