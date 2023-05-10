<?php

session_start();

function error_msg()
{
    if (isset($_SESSION['error_msg'])) {
        $output = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <h6>";

        $output .= htmlentities($_SESSION['error_msg']);

        $output .= "</h6>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

        echo $output;
        $_SESSION['error_msg'] = null;
    }
}


function success_msg()
{
    if (isset($_SESSION['success_msg'])) {
        $output = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <h6>";

        $output .= htmlentities($_SESSION['success_msg']);

        $output .= "</h6>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

        echo $output;
        $_SESSION['success_msg'] = null;
    }
}

