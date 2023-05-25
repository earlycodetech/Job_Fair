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
    <meta name="keywords" content="">
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
        <div  class="container-fluid vh-100 hero-bg d-flex justify-content-center align-items-center">
            <div class="fs-1 fw-bold text-center">
                <p class="text-white">Welcome to Job Fair <br> Where Everybody must work</p>

                <a href="#" class="btn btn-outline-light">Create an Account Now</a>
                <a href="#" class="btn btn-outline-info">Sign In</a>
            </div>
        </div>
    </section>

    <section>
        
        <div class="container-fluid w-100 hero-two-bg">
            
            <h1 class="text-center text-decoration-underline fw-bolder fs-1 text-white">
                Apply For Jobs Here
            </h1>

            <div class="row">

                <?php 
                    $sql = "SELECT * FROM posted_jobs ORDER BY id DESC";
                    $query = mysqli_query($dbConnect, $sql);

                    while ($job = mysqli_fetch_assoc($query)) {
                ?>
                    <div class="categories col-md-3 border border-5 border-secondary-subtle rounded-top m-5 bg-white text-dark">
                        <a href="job-description?q=<?php echo $job['id']; ?>" class="nav-link">
                            <h6 class="text-uppercase text-center text-bg-dark p-4 text-white">
                            <i class="fa-solid fa-database text-white mx-2"></i> <?php echo $job['title']; ?>
                            </h6>    
                        </a>
                    </div>
                <?php } ?>
            </div>

    </section>

    <!-- Footer -->
    <section>
        <div class="btm-pg container-fluid bg-dark d-flex">
            <div class="col-md-4 col-sm-6 col-12">
                <p class="text-white fs-3 border border-2 border-dark w-50 text-center py-2 mt-3">
                    Jobs
                </p>
                <ul class="fs-6 text-capitalize" style="list-style: none; color: white; ">
                    <li>job bonuses</li>
                    <li>salary jobs</li>
                    <li>earn as you work jobs</li>
                    <li>discounted jobs</li>
                </ul>
            </div>
            <div class="col-md-4">
                <p class="text-white fs-3 border border-2 border-dark w-50 text-center py-2 mt-3">
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
            <div class="col-md-4">
                <p class="text-white fs-3 border border-2 border-dark w-50 text-center py-2 mt-3">
                    Contact Us
                </p>
                <ul class="fs-6 text-capitalize" style="list-style: none; color: white; ">
                    <li>Address:</li>
                    <li>Phone Number</li>
                    <li>Email Address</li>
                </ul>
            </div>
        </div>
    </section>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>