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
    if (isset($_SESSION["fname"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navigation</title>
    <?php
        require_once "files.php";
    ?>
    <style>
        .dropdown-menu>a {
            color: white;
        }

        .red:hover {
            color: rgb(238, 71, 71) !important;
        }

        .nav-link {
            color: white !important;
        }

        #user {
            text-decoration: none;
        }

        #user:hover {
            text-decoration: none;
            color: white !important;
        }

        @media(min-width:767px) {
            #userdrop {
                right: 0;
                left: auto;
            }
        }

        @media(max-width:767px) {
            #userdrop {
                right: auto;
                left: auto;
            }

            .dropdown-menu {
                background-color: #6c757d !important;
            }
        }

        /* ak */
        /* .carousel-item img {
            width: 100%;
            height: 550px;
        }
        
        @media ( max-width: 767px) {
            .carousel-item img {
                width: 100%;
                height: 250px;
            }
        }
        
        @media (min-width:768px) and (max-width:1199px) {
            .carousel-item img {
                width: 100%;
                height: 250px;
            }
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        
        .row div[class*='col-'] {
            display: flex;
        }
        
        .card img {
            width: 100%;
            height: 200px;
        }
        
        .bt {
            border-radius: 23px;
        }
        
        @media only screen and (max-width: 768px) {
            .col {
                margin-top: 10px;
                width: calc(50% - 10px);
            }
        }
        
        @media only screen and (max-width: 480px) {
            .col {
                width: 100%;
            }
        } */
    </style>
</head>

<body>
    <!-- navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-dark mb-2">

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

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown3" role="button" data-toggle="dropdown">PARCEL</a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown3">
                        <a class="dropdown-item red" href="newparcel.php">Add New</a>
                        <a class="dropdown-item red" href="listparcel.php">List</a>
                        <a class="dropdown-item red" href="trackparcel.php">Track</a>
                    </div>
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
                    <a href="" class="dropdown-item red"><span class="fa fa-cog"></span> Manage Account</a>
                    <a href="" class="dropdown-item red"><span class="fa fa-sign-out"></span> Logout</a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>
<?php
    } else {
        // if the session variable is not set, redirect the user to the login page
        header("Location: login.php");
        exit();
    }
?>