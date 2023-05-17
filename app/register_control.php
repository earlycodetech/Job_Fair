<?php 
    session_start();
    require "../assets/includes/db_connect.php";

    date_default_timezone_set('Africa/Lagos'); 

    // 1. Check if a use clicked the register button.
    if (!isset($_POST['register'])) {
        $_SESSION['error_msg'] = "Create an account to continue";
        header("Location: ../register");
    }else{
    
        // 2. Collect all the data from the form.
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $state = $_POST['state'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        // 2023-05-16
        $date = date("Y-m-d h:i a"); 

        // 3. Checking if any field is empty.
        foreach ($_POST as $key => $post){
            $val = trim($post);

            if ($val === "" && $key != "register") {
                $_SESSION['error_msg'] = "Fields cannot be empty";
                header("Location: ../register");
                die();
            }
        }

        // 4. Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_msg'] = "Invalid Email";
            header("Location: ../register");
            die();
        }

        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($dbConnect);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        $execute = mysqli_stmt_execute($stmt);
        
        // 6. Get the result after we execute the query
        $result = mysqli_stmt_get_result($stmt);
        
        $number_of_rows = mysqli_num_rows($result);
        
        // 7. Check if the number of rows that has the same email is greater than zero
        if ($number_of_rows > 0) {
            $_SESSION['error_msg'] = "This account already exists";
            header("Location: ../register");
            die();
        }
        elseif (strlen($password) < 8) {
            $_SESSION['error_msg'] = "Password is too short, max: 8 characters";
            header("Location: ../register");
            die();
        } 
        elseif($password != $c_password){
            $_SESSION['error_msg'] = "Passwords do not match";
            header("Location: ../register");
            die();
        }
        // $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        // $number    = preg_match('@[0-9]@', $password);

        //     if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        //     // tell the user something went wrong
        //     }
        else{
                /*
                        CRUD

                        SQL
                    INSERT 
                    SELECT
                    UPDATE 
                    DELETE



                    Prepare Statements
                    1. SQL statement
                    2. Initialize
                    3. Prepare
                    4. Bind
                    5. Execute
                */   

            //5. Hashed the Password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (full_name,address,gender,state,job,email,passwords,created_at) VALUES(?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($dbConnect);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $full_name,$address,$gender,$state,$job,$email, $hash,$date);
            $execute = mysqli_stmt_execute($stmt);

            if ($execute) {
               $_SESSION['success_msg'] = "Account has been created";
               header('Location: ../register');
            }else{
                $_SESSION['error_msg'] = "Oops!, something went wrong. Please try again";
                header('Location: ../register');
            }
          
        }
        
    }