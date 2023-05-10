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

    <!-- Navbar -->
    <section>
      <?php include "assets/includes/nav.php" ?>
    </section>

    <h1>
        <?php echo $_POST["search"]; ?>
    </h1>

    <?php
        var_dump($_GET);
        var_dump($_POST);
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
    

</html>