<?php
    session_start();
    require "../assets/includes/db_connect.php";

    date_default_timezone_set('Africa/Lagos');

// 1. Check if a use clicked the upload button.
if (!isset($_POST['upload'])) {
    $_SESSION['error_msg'] = "Please select an image";
    header("Location: ../users/profile");
}else{
    // 1. Get the file wih the FILES super global variable
    $file = $_FILES['file'];

    // 2. Get the value from the file uploaded 
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileTmpLoc = $file['tmp_name'];



    
    /* This code is extracting the file extension from the uploaded file's name. */
    $ext = explode(".",$fileName);
    // $ext = array_pop($ext);
    $ext = end($ext);
    $ext = strtolower($ext);

    /* ` = ['jpg', 'jpeg', 'png', 'gif'];` is creating an array of file extensions that
    are allowed to be uploaded. In this case, only files with extensions 'jpg', 'jpeg', 'png', and
    'gif' are allowed to be uploaded. */
    $allowed_files = ['jpg', 'jpeg', 'png', 'gif'];

   /* This code block is checking if the file extension of the uploaded file is in the array of allowed
   file extensions. If the file extension is not in the array, it sets an error message in the
   session variable and redirects the user to the profile page. */
    if (!in_array($ext,$allowed_files)) {
        $_SESSION['error_msg'] = "Select an image that is either jpg, jpeg, png or gif";
        header("Location: ../users/profile");
    }
   /* This code block is checking if there was an error during the file upload process. If the value of
   `` is not equal to 0, it means that there was an error during the file upload process.
   In this case, the code sets an error message in the session variable and redirects the user to
   the profile page. The error message informs the user that the file is corrupted. */
    elseif ($fileError !== 0){
        $_SESSION['error_msg'] = "file is corrupted";
        header("Location: ../users/profile");
    }
   /* This code block is checking if the size of the uploaded file is greater than 5000000 bytes (5MB).
   If the file size is greater than 5MB, it sets an error message in the session variable and
   redirects the user to the profile page. The error message informs the user that the file is too
   large. */
    elseif ($fileSize > 5000000){
        $_SESSION['error_msg'] = "file is is too large";
        header("Location: ../users/profile");
    }
    
    else{
        $id = $_SESSION['active_user'];
    /* `` is creating a new file name for the uploaded file. It concatenates the string
    "job_fair_avatar" with the user's ID and the file extension of the uploaded file. This ensures
    that each uploaded file has a unique name and can be easily identified. */
        $newFileName = 'job_fair_avatar'. $id . '.'. $ext;

        /* ` = "../assets/uploads/";` is setting the directory where the uploaded file
        will be stored. The uploaded file will be moved from its temporary location to the directory
        specified by ``. */
        $storageLocation = "../assets/uploads/";

     /* This code block is checking if the uploaded file was successfully moved from its temporary
     location to the directory specified by `` using the `move_uploaded_file()`
     function. If the file was not successfully moved, it sets an error message in the session
     variable and redirects the user to the profile page. */
        if (!move_uploaded_file($fileTmpLoc, $storageLocation.$newFileName)) {
            $_SESSION['error_msg'] = "Failed to upload";
            header("Location: ../users/profile");
        }


    /* This code block is updating the `avatar` column in the `users` table of the database with the
    new file name of the uploaded file. It first prepares an SQL statement to update the `avatar`
    column for the user with the specified `id`. It then binds the new file name and the user's `id`
    to the prepared statement using `mysqli_stmt_bind_param()`. The statement is then executed using
    `mysqli_stmt_execute()`. If the execution is successful, a success message is set in the session
    variable and the user is redirected to their profile page. If the execution fails, an error
    message is set in the session variable and the user is redirected to their profile page. */
        else{
            $sql = "UPDATE users SET avatar = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($dbConnect);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $newFileName,$id);
            $execute = mysqli_stmt_execute($stmt);

            if ($execute) {
                $_SESSION['success_msg'] = "Avatar upload successful";
                header("Location: ../users/profile");
            } else {
                $_SESSION['error_msg'] = "Oops!, something went wrong. Please try again";
                header("Location: ../users/profile");
            }
        }
    }
}