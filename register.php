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
  <link rel="stylesheet" href="register.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Proza+Libre&display=swap" rel="stylesheet">

</head>

<body>
  <section>
    <?php include "assets/includes/nav.php" ?>
  </section>
  <section class="h-100 bg-black">
    <div class="container py-5 h-100 bg-dark-subtle p-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
      


            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block mb-5 col-2">
                <img src="assets/img/adolfo-felix-Yi9-QIObQ1o-unsplash.jpg" alt="image" class="img-fluid" style="border-top-left-radius: .30rem; border-bottom-left-radius: .30rem;" />
              </div>
              <div class="col-xl-6">
                <form action="app/register_control.php" method="POST" class="card-body p-md-5 text-black">
                    <?php error_msg(); success_msg(); ?>
                  <h3 class="mb-5 text-uppercase https://fonts.googleapis.com/css2?family=Libre+Franklin&family=Proza+Libre&display=swap">REGISTER</h3>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="full_name" type="text" id="form3Example1m" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m">Full name</label>
                      </div>
                    </div>

                    <div class="form-outline mb-2">
                      <input name="address" type="text" id="form3Example8" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example8">Address</label>
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" name="gender" type="radio" id="femaleGender" value="female" />
                        <label class="form-check-label" for="femaleGender">Female</label>
                      </div>

                      <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input"  name="gender" type="radio" id="maleGender" value="male" />
                        <label class="form-check-label" for="maleGender">Male</label>
                      </div>

                      <div class="form-check form-check-inline mb-0">
                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="others" />
                        <label class="form-check-label" for="otherGender">Other</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">

                        <select name="state" class="form-select">
                          <option disabled>State</option>
                          <option>Abuja</option>
                          <option>Lagos</option>
                          <option>Imo</option>
                          <option>Benue</option>
                          <option>Rivers</option>
                        </select>

                      </div>
                      <div class="col-md-6 mb-4">

                        <select class="form-select" name="job">
                          <option disabled>Job description</option>
                          <option>Accountant</option>
                          <option>Engineer</option>
                          <option>Pharmacist</option>
                          <option>Pub.Administrator</option>
                          <option>Nurse</option>

                        </select>

                      </div>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" name="email" id="form3Example90" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example90">Email</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form3Example99" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example99">Password</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="c_password" id="form3Example97" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Example97">Confirm Password</label>
                    </div>

                    <div class="d-flex justify-content-end pt-3">
                      <button type="button" class="btn btn-light btn-lg">Reset all</button>
                      <button type="submit" name="register" class="btn btn-warning btn-lg ms-2">Submit form</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>