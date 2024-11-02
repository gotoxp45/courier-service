<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}
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
    <title>edit staff</title>
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
                    <h1 class="m-0">Edit Staff</h1>
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
                        <form action="editstaffdata.php" method="post" id="manage-staff" class="was-validated">
                        <?php
                            $id = $_GET['id']; //get from url of page ?id=1
                            $connection = mysqli_connect("localhost", "root", "", "project_cms") or die("connection fail");
                            // include "dbcon.php";//
                            $query = "select * from user where id=$id";
                            $record = mysqli_query($connection, $query);
                            $row = mysqli_fetch_array($record);
                            $role = $row['role'];
                            $pass = $row['password'];
                            $tempbranchid = $row['branchid'];
                            mysqli_close($connection);
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="msg" class=""></div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">First Name [First-Last]</label>
                                            <input type="text" class="form-control" name="fullname" required value="<?php echo $row['fname']?>">
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact Number</label>
                                            <input type="number" class="form-control" name="number" required max="9999999999" min="1000000000" value="<?php echo $row['contact']?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">E-mail</label>
                                            <input type="email" class="form-control" required name="email" value="<?php echo $row['email']?>">
                                            <div class="invalid-feedback">
                                                enter valid e-mail
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Branch</label>
                                            <select name="branchid" id="" class="form-control input-sm">
                                                
                                            <?php
                                                $connection = mysqli_connect("localhost", "root", "", "project_cms") or die("connection fail");
                                                // include "dbcon.php";
                                                $query = "select * from branch";
                                                $record=mysqli_query($connection, $query) or die("query fail");
                                                $num_result = mysqli_num_rows($record);
                                                for($i=0;$i<$num_result;$i++)
                                                {
                                                    $row = mysqli_fetch_array($record);
                                                    $selected = '';
                                                    if($row["id"] == $tempbranchid)
                                                    {
                                                        $selected = 'selected';
                                                    }
                                                    else{

                                                    }
                                                    echo '<option value=' . $row["id"].' '.$selected
                                                    .'>'.$row["street"].' | '.$row["city"].'</option>';
                                                }
                                                
                                                mysqli_close($connection);
                                            ?>    
                                            </select>

                                        </div>
                                        
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Password</label>
                                            <input type="password" class="form-control" required name="pass" value="<?php echo $pass ?>">
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label for="" class="control-label">Role</label>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rdrole" id="rdadmin" value="1" <?php if($role == 1) echo "checked" ?>>
                                                <label class="form-check-label text-dark" for="rdadmin">
                                                    Admin
                                                </label>
                                                </div>
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rdrole" id="rdstaff" value="2" <?php if($role == 2) echo "checked" ?>>
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
                            <a class="btn btn-secondary mx-2" href="listparcel.php">Cancel</a>
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