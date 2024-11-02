<?php
    // start the session
    // session_start();
    // if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (!isset($_SESSION)) {
        session_start();
    }

    // check if the session variable is set
    if (isset($_SESSION["userid"])) {
        if($_SESSION["role"] == 1){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newstaff</title>
    <?php
    require_once "files.php";
    ?>
    <style>
        .control-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php
        if($_SESSION["role"] == 1)
        {
            include "header1.php";
        }
        if($_SESSION["role"] == 2){
            include "header2.php";
        }
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Staff</h1>
                </div>

            </div>
            <hr class="border-primary">
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <style>
                textarea {
                    resize: none;
                }
            </style>
            <div class="col-lg-12">
                <div class="card card-outline">
                    <div class="card-body">
                        <form action="newstaffdata.php" method="post" id="manage-branch" class="was-validated">
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="msg" class=""></div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">First Name [First-Last]</label>
                                            <input type="text" class="form-control" name="fullname" required>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact Number</label>
                                            <input type="number" class="form-control" name="number" required max="9999999999" min="1000000000">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">E-mail</label>
                                            <input type="email" class="form-control" required name="email">
                                            <div class="invalid-feedback">
                                                enter valid e-mail
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Branch</label>
                                            <select name="branchid" id="" class="form-control input-sm select2">
                                                <!-- <option value="1">vzTL0PqMogyOWhF | Branch 1 St., Quiapo, Manila, Metro Manila, 1001, Philippines</option> -->
                                                <?php
                                                // $connection = mysqli_connect("localhost", "root", "", "project_cms") or die("connection fail");
                                                include "dbcon.php";
                                                $query = "select * from branch";
                                                $record=mysqli_query($connection, $query) or die("query fail");
                                                
                                                $num_result = mysqli_num_rows($record);
                                                for($i=0;$i<$num_result;$i++)
                                                {
                                                    $row = mysqli_fetch_array($record);
                                                    echo '<option value='.$row["id"].'>'.$row["street"].' | '.$row["city"].'</option>';
                                                }
                                                
                                                mysqli_close($connection);
                                                ?>
                                            </select>

                                        </div>
                                        
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Password</label>
                                            <input type="password" class="form-control" required name="password">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="" class="control-label">Role</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rdrole" id="rdadmin" value="1" checked>
                                                <label class="form-check-label text-dark" for="rdadmin">
                                                    Admin
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rdrole" id="rdstaff" value="2" checked>
                                                <label class="form-check-label text-dark" for="rdstaff">
                                                    Staff
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                    </div>
                    <div class="card-footer border-top border-info">
                        <div class="d-flex w-100 justify-content-center align-items-center">
                            <input type="submit" name="submit" class="btn btn-success mx-2">
                            <a class="btn btn-secondary mx-2" href="">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
    </section>
    <?php
    include "footer.php";
    ?>
</body>

</html>
<?php
        }
        else{
            header("Location: error404.php");
        }
    } else {
        // if the session variable is not set, redirect the user to the login page
        header("Location: login.php");
        exit();
    }
?>