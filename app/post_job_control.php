<?php
session_start();
require "../assets/includes/db_connect.php";


// 1. Check if a use clicked the post-job button.
if (!isset($_POST['post-job'])) {
    $_SESSION['error_msg'] = "Create an account to continue";
    header("Location: ../users/post-job");
} else {
    $user_id = $_SESSION['active_user'];
    $title = $_POST['title'];
    $description = addslashes($_POST['description']);

    // 3. Checking if any field is empty.
    foreach ($_POST as $key => $post) {
        $val = trim($post);

        if ($val === "" && $key != "post-job") {
            $_SESSION['error_msg'] = "Fields cannot be empty";
            header("Location: ../users/post-job");
            die();
        }
    }


    $sql = "INSERT INTO posted_jobs (user_id,title,description) VALUES(?,?,?)";
    $stmt = mysqli_stmt_init($dbConnect);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $user_id, $title, $description);
    $execute = mysqli_stmt_execute($stmt);

    if ($execute) {
        $_SESSION['success_msg'] = "Job posting has been created";
        header("Location: ../users/post-job");
    } else {
        $_SESSION['error_msg'] = "Oops!, something went wrong. Please try again";
        header("Location: ../users/post-job");
    }
}
