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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newparel</title>
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
                    <h1 class="m-0">Edit Parcel</h1>
                </div>

            </div>
            <hr class="border-primary">
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card card-outline">
                    <div class="card-body">
                        <form action="editparceldata.php" method="post" id="manage-branch" class="was-validated">
                        <?php
                            $id = $_GET['id']; //get from url of page ?id=1
                            // $connection1 = mysqli_connect("localhost", "root", "", "project_cms") or die("connection fail");
                            include "dbcon.php";
                            $query1 = "select * from parcel where id=$id";
                            $record1 = mysqli_query($connection, $query1);
                            $row1 = mysqli_fetch_array($record1);
                            $dp = $row1["dp"];
                            $tempbranchid = $row1['dbranchid'];
                            $tempbranchid1 = $row1['pbranchid'];
                            $pst = $row1['status'];
                            mysqli_close($connection);
                        ?>
                        <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                        <input type="hidden" id="temp" value="<?php echo $tempbranchid ?>">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="font-weight-bold mb-2">
                                        Sender Information
                                    </div>
                                    <hr class="alert-dark">        
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Full Name [First-Last]</label>
                                            <input type="text" class="form-control" name="sfullname" value="<?php echo $row1['sname'] ?>" required>
                                        </div>

                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">E-mail</label>
                                            <input type="email" class="form-control" value="<?php echo $row1['semail'] ?>" required name="semail">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Address</label>
                                            <input type="text" class="form-control" name="saddress" value="<?php echo $row1['saddress'] ?>" required>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact Number</label>
                                            <input type="number" class="form-control" name="snumber" value="<?php echo $row1['scontact'] ?>" required max="9999999999" min="1000000000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="font-weight-bold mb-2">
                                        Receiver Information
                                    </div>
                                    <hr class="alert-dark">
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Full Name [First-Last]</label>
                                            <input type="text" class="form-control" name="rfullname" value="<?php echo $row1['rname'] ?>" required>
                                        </div>

                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">E-mail</label>
                                            <input type="email" class="form-control" value="<?php echo $row1['remail'] ?>" required name="remail">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Address</label>
                                            <input type="text" class="form-control" name="raddress" value="<?php echo $row1['raddress'] ?>" required>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Contact Number</label>
                                            <input type="number" class="form-control" name="rnumber" value="<?php echo $row1['rcontact'] ?>" required max="9999999999" min="1000000000">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <div class="font-weight-bold mb-2">
                                        Parcel Information
                                    </div>
                                    <hr class="alert-dark">
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-4 form-group ">
                                            <label for="" class="control-label">Parcel weight</label>
                                            <input type="number" class="form-control" name="weight" value="<?php echo $row1['pweight'] ?>" required>
                                        </div>

                                        <div class="col-sm-4 form-group ">
                                            <label for="" class="control-label">Parcel height</label>
                                            <input type="number" class="form-control" value="<?php echo $row1['pheight'] ?>" required name="height">
                                        </div>
                                        
                                        <div class="col-sm-4 form-group ">
                                            <label for="" class="control-label">Parcel width</label>
                                            <input type="number" class="form-control" value="<?php echo $row1['pwidth'] ?>" required name="width">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Parcel length</label>
                                            <input type="number" class="form-control" name="length" value="<?php echo $row1['plength'] ?>" required>
                                        </div>
                                        <div class="col-sm-6 form-group ">
                                            <label for="" class="control-label">Parcel price</label>
                                            <input type="number" class="form-control" name="price" value="<?php echo $row1['pprice'] ?>" required max="100000" min="100">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="" class="control-label">Option</label>
                                    <div class="form-check">
                                        <input class="form-check-input  " type="radio" name="rdp" id="rddel" value="1" <?php if($dp == 1) echo "checked" ?>>
                                        <label class="form-check-label text-dark" for="rddel">Deliver</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rdp" id="rdpic" value="2" <?php if($dp == 2) echo "checked" ?>>
                                        <label class="form-check-label text-dark" for="rdpic">Pickup</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="status" class="control-label">Status</label><br>
                                    <select class="form-select border border-success mb-3" aria-label="Static select example" id="pst" name="pst">
                                        <?php if($dp == 1) { ?>
                                        <option value="1" <?php if($pst == 1) {echo "selected"; } ?> >Parcel accepted</option>
                                        <option value="2" <?php if($pst == 2) {echo "selected"; } ?> >Shipped</option>
                                        <option value="3" <?php if($pst == 3) {echo "selected"; } ?>>Out for delivery</option>
                                        <!-- <option value="4" <?php if($pst == 4) {echo "selected"; } ?> >Ready to pickup</option> -->
                                        <option value="5" <?php if($pst == 5) {echo "selected"; } ?> >Delivered</option>
                                        <!-- <option value="6" <?php if($pst == 6) {echo "selected"; } ?> >Picked up</option> -->
                                        <option value="7" <?php if($pst == 7) {echo "selected"; } ?> >Not delivered</option>

                                        <?php }else{ ?>
                                            <option value="1" <?php if($pst == 1) {echo "selected"; } ?> >Parcel accepted</option>
                                            <option value="2" <?php if($pst == 2) {echo "selected"; } ?> >Shipped</option>
                                            <!-- <option value="3" <?php if($pst == 3) {echo "selected"; } ?>>Out for delivery</option> -->
                                            <option value="4" <?php if($pst == 4) {echo "selected"; } ?> >Ready to pickup</option>
                                            <!-- <option value="5" <?php if($pst == 5) {echo "selected"; } ?> >Deliverd</option> -->
                                            <option value="6" <?php if($pst == 6) {echo "selected"; } ?> >Picked up</option>
                                            <!-- <option value="7" <?php if($pst == 7) {echo "selected"; } ?> >Not delivered</option> -->
                                        <?php }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <select name="delivery" id="del" class="form-control">
                                            <?php
                                                // $connection = mysqli_connect("localhost", "root", "", "project_cms") or die("connection fail");
                                                include "dbcon.php";

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
                                <div class="col-sm-6 form-group">
                                    <select name="pickup" id="pic" class="form-control  border border-success">
                                            <?php
                                                // $connection = mysqli_connect("localhost", "root", "", "project_cms") or die("connection fail");
                                                include "dbcon.php";

                                                $query = "select * from branch";
                                                $record=mysqli_query($connection, $query) or die("query fail");
                                                $num_result = mysqli_num_rows($record);
                                                for($i=0;$i<$num_result;$i++)
                                                {
                                                    $row = mysqli_fetch_array($record);
                                                    $selected = '';

                                                    if($row["id"] == $tempbranchid1)
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

                             <script>
                                $(document).ready(function(){   
                                    var selectedValue = $('input[name="rdp"]:checked').val();
                                        
                                        if (selectedValue === '1') {
                                            $('#del').show();
                                            $('#pic').hide();
                                        } else if (selectedValue === '2') {
                                            $('#del').show();
                                            $('#pic').show();
                                        }
                                    
                                    $('input[name="rdp"]').on('change', function() {
                                        var selectedValue = $('input[name="rdp"]:checked').val();
                                        // show or hide the appropriate select element
                                        if (selectedValue === '1') {
                                            $('#del').show();
                                            $('#pic').hide();
                                        } else if (selectedValue === '2') {
                                            $('#del').show();
                                            $('#pic').show();
                                        }
                                    });
                                });
                            </script>

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
    <script>
        $(document).ready(function(){
            
        });
    </script>
</body>

</html>
<?php
    } else {
        // if the session variable is not set, redirect the user to the login page
        header("Location: login.php");
        exit();
    }
?>