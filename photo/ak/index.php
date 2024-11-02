<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="library files/bootstrap-4.6.1/dist/css/bootstrap.min.css">
    <script src="library files/bootstrap-4.6.1/dist/js/jquery.js"></script>
    <script src="library files/bootstrap-4.6.1/dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="library files/fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="icon" href="logo.jpg">
    <title>index</title>
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
        
        .carousel-item img {
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
        }
    </style>
</head>

<body>
    <!-- navigation -->
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

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown1" role="button" data-toggle="dropdown">BRANCH</a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item red" href="newbranch.php">Add New</a>
                        <a class="dropdown-item red" href="listbranch.php">List</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown2" role="button" data-toggle="dropdown">STAFF</a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item red" href="newstaff.php">Add New</a>
                        <a class="dropdown-item red" href="liststaff.php">List</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle font-weight-bold px-3 red" id="navbarDropdown3" role="button" data-toggle="dropdown">PARCEL</a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown3">
                        <a class="dropdown-item red" href="newparcel.php">Add New</a>
                        <a class="dropdown-item red" href="listparcel.php">List</a>
                        <a class="dropdown-item red" href="trackparcel.php">Track</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-weight-bold px-3 red" href="">REPORT</a>
                </li>
            </ul>

            <!-- account name -->
            <div class="dropdown ml-3">
                <span class="fa fa-user text-white"></span>
                <a href="#" style="color: aliceblue;" class="dropdown dropdown-toggle" data-toggle="dropdown" id="user">tirth</a>
                <div class="dropdown-menu bg-dark" aria-labelledby="user" id="userdrop">
                    <a href="" class="dropdown-item red"><span class="fa fa-cog"></span> Manage Account</a>
                    <a href="" class="dropdown-item red"><span class="fa fa-sign-out"></span> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- caresoul -->
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="c1.jpg" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                    <h2>Welcome to iCoder</h2>
                    <p>Technology News , Development and Trends</p>
                    <button class="btn btn-danger "> <a class="text-decoration-none text-light " href="newparcel.php">Add Parcel</a></button>
                    <button class="btn btn-primary "> <a class="text-decoration-none text-light " href="trackparcel.php">Track Parcel</a></button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="c2.jpg" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                    <h2>Welcome to iCoder</h2>
                    <p>Technology News , Development and Trends</p>
                    <button class="btn btn-danger "> <a class="text-decoration-none text-light " href="newparcel.php">Add Parcel</a></button>
                    <button class="btn btn-primary "> <a class="text-decoration-none text-light " href="trackparcel.php">Track Parcel</a></button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="c3.jpg" class="d-block w-100 img-fluid" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                    <h2>Welcome to iCoder</h2>
                    <p>Technology News , Development and Trends</p>
                    <button class="btn btn-danger "> <a class="text-decoration-none text-light " href="newparcel.php">Add Parcel</a></button>
                    <button class="btn btn-primary "> <a class="text-decoration-none text-light " href="trackparcel.php">Track Parcel</a></button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
    </div>
    <div class="container my-5">
        <h1 class="text-center my-4 mb-4">FOLLOW SIMPLE STEPS</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <i class="fa-solid fa-file-waveform" style="color :rgb(238, 71, 71); font-size: xx-large;"></i>
                    <h4>Fill the Form</h4>
                    <p>We specialize in the rapid, cost-effective and realiable delivery of couriers across different locations.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <i class="fa-solid fa-file-waveform" style="color :rgb(238, 71, 71); font-size: xx-large;"></i>
                    <h4>We Collect</h4>
                    <p>Priority depends on the urgency of the package and type of goods, catering to varying budgets.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <i class="fa-solid fa-file-waveform" style="color :rgb(238, 71, 71); font-size: xx-large;"></i>
                    <h4>Delivery</h4>
                    <p>Our reliable logistics network enables the fastest and most dependable door-to-door transit service in the industry.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- services -->
    <div class="container mt-3">
        <h1 class="text-center">Services</h1>
        <div class="row mt-3">
            <div class=" col col-md-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="s1.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Express Delivery</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="bt btn btn-primary btn-sm">Enquire Now</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="s2.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Delivery of Goods</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="bt btn btn-primary btn-sm">Enquire Now</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="s3.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Standard Delivery</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="bt btn btn-primary btn-sm">Enquire Now</a>
                    </div>
                </div>
            </div>
            <div class="col col-md-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="s4.webp" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bulk Delivery</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="bt btn btn-primary btn-sm">Enquire Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <footer class="container-fluid bg-dark p-3 mt-3">
        <div class="text-white text-center">&copy; copyright <span id="yr"></span> all rights reserved - Rapid Courier</div>
        <div class="text-white text-center font-weight-bold">Developed by</div>
        <div class="text-white text-center">20BCA002 - Tirth Bhingradiya</div>
        <div class="text-white text-center">20BCA089 - Deep Gabani</div>
    </footer>
    <script>
        const d = new Date().getFullYear();
        document.getElementById('yr').innerHTML = d;
    </script>
</body>

</html>