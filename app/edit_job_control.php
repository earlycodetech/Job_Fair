<?php
session_start();
require "../assets/includes/db_connect.php";


// 1. Check if a use clicked the edit-job button.
if (!isset($_POST['edit-job'])) {
    $_SESSION['error_msg'] = "Create an account to continue";
    header("Location: ../users/post-job");
} else {
    $job_id = $_POST['id'];
    $user_id = $_SESSION['active_user'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $description = addslashes($_POST['description']);

    // 3. Checking if any field is empty.
    foreach ($_POST as $key => $post) {
        $val = trim($post);

        if ($val === "" && $key != "edit-job") {
            $_SESSION['error_msg'] = "Fields cannot be empty";
            header("Location: ../users/post-job");
            die();
        }
    }


    $sql = "UPDATE posted_jobs SET title = ?, description = ?, job_status = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($dbConnect);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssss",$title, $description, $status, $job_id);
    $execute = mysqli_stmt_execute($stmt);

    if ($execute) {
        $_SESSION['success_msg'] = "Job posting has been updated";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['error_msg'] = "Oops!, something went wrong. Please try again";
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
