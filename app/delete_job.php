<?php 
    session_start();
    require "../assets/includes/db_connect.php";

    date_default_timezone_set('Africa/Lagos'); 

    // 1. Check if a use clicked the delete button.
    if (!isset($_GET['del'])) {
        $_SESSION['error_msg'] = "Create an account to continue";
        header("Location: logout");
    }else{
        $del = $_GET['del'];


        $sql = "DELETE FROM posted_jobs WHERE id = ?";
        $stmt = mysqli_stmt_init($dbConnect);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "s", $del);
        $execute = mysqli_stmt_execute($stmt);

        if ($execute) {
           $_SESSION['success_msg'] = "Job posting has been deleted";
           header('Location: ../users/all-jobs');
        }else{
            $_SESSION['error_msg'] = "Oops!, something went wrong. Please try again";
            header('Location: ../users/all-jobs');
        }      
    }