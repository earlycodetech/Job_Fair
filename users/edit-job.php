<?php
require "../assets/includes/db_connect.php";
require "../assets/includes/sessions.php";

auth_guard();
$id =  $_SESSION['active_user'];

$q = $_GET['q'];

$sql = "SELECT * FROM users WHERE id = '$id' ";
$query = mysqli_query($dbConnect, $sql);
$row = mysqli_fetch_assoc($query);

$sql = "SELECT * FROM posted_jobs WHERE id = '$q' ";
$query = mysqli_query($dbConnect, $sql);
$job = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/offcanvas-navbar.css">
</head>

<body>
    <section>
        <?php include_once "../assets/includes/master-nav.php" ?>
    </section>


    <section>
        <div class="container">
            <div class="p-2">
                    <?php error_msg(); success_msg(); ?>
            </div>
            <form action="../app/edit_job_control.php" method="post" class="card my-3">
                <div class="card-header bg-light">
                    <h5>Post a Job</h5>
                </div>
                <div class="card-body">
                    <label for="">Job Title</label>
                    <input type="hidden" name="id" value="<?php echo $job['id']; ?>">
                    <input type="text" value="<?php echo $job['title']; ?>" name="title" class="form-control mb-3">
                    
                    <label for="">Job Status</label>
                    <select name="status" class="form-select mb-3">
                        <option <?php echo $job['job_status'] == 'available'? 'selected': ''; ?>>available</option>
                        <option <?php echo $job['job_status'] != 'available'? 'selected': ''; ?>>closed</option>
                    </select>

                    <textarea name="description" id="editor" class="form-control">
                        <?php echo $job['description']; ?>
                    </textarea>

                    <div class="my-3">
                        <button name="edit-job" class="btn btn-success">
                            Edit Job
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/offcanvas-navbar.js"></script>
    <script src="../assets/vendor/ckeditor/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>