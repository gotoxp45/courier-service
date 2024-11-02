<nav class="navbar navbar-expand-md navbar-light bg-dark">

<!-- logo -->
<a href="index.php" class="navbar-brand"><img src="logo.jpg" class="img-fluid rounded-circle" width="80px"></a>

<!-- toggler button for screen size is small or medium -->
<button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- nav items -->
<div class="collapse navbar-collapse justify-content-between" id="nav">
    <ul class="navbar-nav">

        <!-- <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown1" role="button" data-toggle="dropdown">BRANCH</a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown1">
                <a class="dropdown-item red" href="newbranch.php">Add New</a>
                <a class="dropdown-item red" href="listbranch.php">List</a>
            </div>
        </li> -->

        <!-- <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown2" role="button" data-toggle="dropdown">STAFF</a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown2">
                <a class="dropdown-item red" href="newstaff.php">Add New</a>
                <a class="dropdown-item red" href="liststaff.php">List</a>
            </div>
        </li> -->

        <!-- <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown3" role="button" data-toggle="dropdown">PARCEL</a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown3">
                <a class="dropdown-item red" href="newparcel.php">Add New</a>
                <a class="dropdown-item red" href="listparcel.php">List</a>
                <a class="dropdown-item red" href="trackparcel.php">Track</a>
            </div>
        </li> -->
        <li class="nav-item">
            <a class="nav-link font-weight-bold px-3 red" href="newparcel.php">ADD PARCEL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold px-3 red" href="listparcel.php">LIST PARCEL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold px-3 red" href="trackparcel.php">TRACK PARCEL</a>
        </li>

        <li class="nav-item">
            <a class="nav-link font-weight-bold px-3 red" href="report.php">REPORT</a>
        </li>
    </ul>

    <!-- account name -->
    <div class="dropdown ml-3">
        <span class="fa fa-user text-white"></span>
        <a href="#" style="color: aliceblue;" class="dropdown dropdown-toggle" data-toggle="dropdown" id="user"><?php
                                                                                                                echo $_SESSION['fname'];
                                                                                                                ?></a>
        <div class="dropdown-menu bg-dark" aria-labelledby="user" id="userdrop">
            <a href="" id="manage" class="dropdown-item red" data-toggle='modal' data-target='#myModal2'><span class="fa fa-cog"></span> Manage Account</a>
            <a href="logout.php" class="dropdown-item red"><span class="fa fa-sign-out"></span> Logout</a>
        </div>
    </div>
</div>
</nav>
<div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
<div class="modal-dialog ">
    <div class="modal-content">
        <div class="modal-header alert-dark">
            <h5 class="modal-title" id="exampleModalLabel2">UPDATE INFORMATION</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?php
                include "dbcon.php";
                $id = $_SESSION["userid"];
                $query = "select * from user where id=$id";
                $record = mysqli_query($connection, $query);
                $row = mysqli_fetch_array($record);
            ?>
            <form action="manageuserdata.php" method="post" class="was-validated">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="row">
                <div class="col-sm-12 form-group ">
                    <input type="text" class="form-control" name="fullname" required value="<?php echo $row['fname'] ?>">
                </div>
                <div class="col-sm-12 form-group ">
                    <input type="email" class="form-control" name="email" required value="<?php echo $row['email'] ?>">
                </div>
                <div class="col-sm-12 form-group">
                    <input type="number" class="form-control" name="number" required max="9999999999" min="1000000000" value="<?php echo $row['contact'] ?>">
                </div>
                <div class="col-sm-12 form-group">
                <input type="password" class="form-control" required name="password" value="<?php echo $row['password'] ?>">
                </div>
                <div class="col-sm-12 form-group">
                <input type="submit" class="btn btn-success" name="submit">
                </div>
                </div>
            </form>
        </div>
        <div class="modal-footer alert-dark">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>