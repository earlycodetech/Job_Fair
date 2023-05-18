<?php
session_start();
require "../assets/includes/db_connect.php";

date_default_timezone_set('Africa/Lagos');

// 1. Check if a use clicked the register button.
if (!isset($_POST['update'])) {
    $_SESSION['error_msg'] = "Create an account to continue";
    header("Location: ../users/profile");
} else {

    // 2. Collect all the data from the form.
    $full_name = $_POST['fname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $job = $_POST['job'];

    // 3. Checking if any field is empty.
    foreach ($_POST as $key => $post) {
        $val = trim($post);

        if ($val === "" && $key != "update") {
            $_SESSION['error_msg'] = "Fields cannot be empty";
            header("Location: ../users/profile");
            die();
        }
    }

    $id = $_SESSION['active_user'];

    $sql = "UPDATE users SET full_name = ?, address = ?, gender = ?, state = ?, job = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($dbConnect);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $full_name, $address, $gender, $state, $job, $id);
    $execute = mysqli_stmt_execute($stmt);

    if ($execute) {
        $_SESSION['success_msg'] = "Account has been updated";
          header("Location: ../users/profile");
    } else {
        $_SESSION['error_msg'] = "Oops!, something went wrong. Please try again";
          header("Location: ../users/profile");
    }
}
