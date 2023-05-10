<?php 
    session_start();

    // 1. Check if a use clicked the register button
    if (!isset($_POST['register'])) {
        $_SESSION['error_msg'] = "Create an account to continue";
        header("Location: ../register");
    }else{
    
        // 2. Collect all the data from the form
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $state = $_POST['state'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        $_SESSION['success_msg'] = "Account has been created successfully";
        header("Location: ../register");
    }