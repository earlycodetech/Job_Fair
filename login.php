<?php 
    require "assets/includes/sessions.php";
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

<body style="background-image: url(assets/img/office.jpg);">
    <section>
        <?php include "assets/includes/nav.php" ?>
    </section>
    
    <section>
        <div class="container my-5">
            <div class="card border-0 shadow mx-auto p-1" style="max-width: 400px;">
                <?php success_msg(); error_msg(); ?>
                <h5 class="card-header bg-white pt-4">Login to your account</h5>
                <form method="post" action="app/login_control.php" class="card-body">
                    <label for="" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control mb-3">

                    <label for="" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control mb-3">

                    <button name="login" class="btn btn-primary my-3 w-100">Login</button>
                </form>
            </div>
        </div>
    </section>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>