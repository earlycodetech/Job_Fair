<?php
    session_start();
    require "../assets/includes/db_connect.php";
    
    if (!isset($_POST['login'])) {
        $_SESSION['error_msg'] = "Create an account to continue";
        header("Location: ../register");
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        // 3. Check if any input is empty
        foreach ($_POST as $key => $post){
             $val = trim($post);

            if ($val === "" && $key != "login") {
                $_SESSION['error_msg'] = "Fields cannot be empty";
                header("Location: ../login");    
                die();
            }
        }

        // 4. Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_msg'] = "Invalid Email";
            header("Location: ../login");
            die();
        }
        
        
        // 5. Select the records of a user that has the email that is trying to login
        $sql = "SELECT *  FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($dbConnect);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        $execute = mysqli_stmt_execute($stmt);
        
        // 6. Get the result after we execute the query
        $result = mysqli_stmt_get_result($stmt);
        
        $number_of_rows = mysqli_num_rows($result);
        
        // 7. Checking if the number of rows returned is not 1, when it is not 1, it means the account does not exist
        if ($number_of_rows != 1) {
            $_SESSION['error_msg'] = "This account does not exist";
            header("Location: ../login");
            die();
        }
        
        
        $row = mysqli_fetch_assoc($result);
        
        $hash = $row['passwords'];
        
        // 8. Use password verify to check if the password matches the hashed password
        if (!password_verify($password , $hash)) {
            $_SESSION['error_msg'] = "Incorrect Password";
            header("Location: ../login");
            die();
        }


        // 9: AUTHORIZE THE USER
        $_SESSION['active_user'] = $row['id'];
        header("Location: ../users/dashboard");

    }