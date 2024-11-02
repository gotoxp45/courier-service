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
    <title>newbranch</title>
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
    <!-- title and line -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Branch</h1>
            </div>
        </div>
        <hr class="border-primary">
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
                        <form action="newbranchdata.php" method="post" id="manage-branch" class="was-validated">
                            <input type="hidden" name="id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Street/Building</label>
                                            <textarea name="street" id="" cols="30" rows="2" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">City</label>
                                            <input type="text" class="form-control" name="city" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">State</label>
                                            <input type="text" class="form-control" name="state" required>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Zip Code</label>
                                            <input type="number" class="form-control" max="999999" min="100000" name="zip" required>
                                            <div class="invalid-feedback">
                                                enter 6 digit
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Country</label>
                                            <input type="text" class="form-control" name="country" required>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact </label>
                                            <input type="number" class="form-control" max="9999999999" min="1000000000" name="contact" required>
                                            <div class="invalid-feedback">
                                                enter 10 digit
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
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