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
    <title>Profile</title>
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
                <form class="col-md-6 mb-3" method="post" action="../app/profile_update.php">
                    <div class="m-2">
                        <?php success_msg(); error_msg(); ?>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label for="">Full Name:</label>
                            <input type="text" value="<?php echo $row['full_name'] ?>" name="fname" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label for="">Address:</label>
                            <input type="text" value="<?php echo $row['address'] ?>" name="address" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label for="">Gender:</label>
                            <select name="gender" class="form-select">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                                <option selected disabled></option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <label for="">State:</label>
                            <select name="state" class="form-select">
                                <option>Abuja</option>
                                <option>Lagos</option>
                                <option>Imo</option>
                                <option>Benue</option>
                                <option>Rivers</option>
                                <option selected disabled></option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <label for="">Job:</label>
                            
                            <select class="form-select" name="job">
                                <option>Accountant</option>
                                <option>Engineer</option>
                                <option>Pharmacist</option>
                                <option>Pub.Administrator</option>
                                <option>Nurse</option>
                                <option selected disabled></option>
                            </select>
                        </li>

                        <li class="list-group-item">
                            <button class="btn btn-primary" name="update" >Edit Profile</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/offcanvas-navbar.js"></script>
</body>

</html>