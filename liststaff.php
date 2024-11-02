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
    <title>staff list</title>
    <?php
        require_once "files.php";
    ?>
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
                <h1 class="m-0">Staff List</h1>
            </div>
        </div>
        <hr class="border-primary">
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-sm-3 form-group mr-auto">
                            <div class="font-weight-bold">Records:</div>
                            <select name="lim" id="lim" class="form-control">
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            </div>

                            <div class="col-sm-3 form-group ml-auto">
                            <div class="font-weight-bold">Search:</div>
                            <input type="text" class="form-control" placeholder="Search" id="ser">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-lg table-bordered" id="display">
                            <?php
                            // include "listbranchdata.php";
                            // $connection = mysqli_connect("localhost", "root", "", "project_cms");
                            include "dbcon.php";
                            $limit = 20;
                            // if (isset($_GET["page"])) {
                            //     $page = $_GET["page"];
                            // } else {
                            //     $page = 1;
                            // }
                            // $offset = ($page - 1) * $limit; //pagination

                            $query = "select * from user LIMIT {$limit}";
                            $record = mysqli_query($connection, $query);

                            echo '<thead class="thead-light">';
                            echo '<tr>';
                            echo '<th scope="col">Sr no</th>';
                            echo '<th scope="col">Full Name</th>';
                            echo '<th scope="col">E-mail</th>';
                            echo '<th scope="col">Branch Id</th>';
                            echo '<th scope="col">Contact</th>';
                            echo '<th scope="col" class="text-center">Action</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            // if (isset($_GET['page'])) {
                            //     $page = $_GET['page'];
                            // } else {
                            //     $page = 1;
                            // }
                            // $count = 0;
                            // if ($page == 1) { //handle count
                            //     $count = 1;
                            // } else {
                            //     $count = ($page * 4) - 3; //formula for serial number
                            // }
                            $count = 1;
                            while (($row = mysqli_fetch_array($record)) == true) {
                                echo '<tr>';
                                echo '<th scope="row">' . $count++ . '</th>';
                                echo '<td>' . $row['fname'] . '</td>';
                                echo '<td>' . $row['email']. '</td>';
                                echo '<td>' . $row['branchid'] . '</td>';
                                echo '<td>' . $row['contact'] . '</td>';
                                echo '<td class="text-center">';
                                echo '<div class="btn-group">';
                                echo "<a href='editstaff.php?id=$row[id]' class='btn btn-primary btn-flat'>";
                                echo '<i class="fas fa-edit"></i>';
                                echo '</a>';
                                echo "<a href='deletestaff.php?id=$row[id]' class='btn btn-danger btn-flat' onclick='return checkDelete()'>";
                                echo '<i class="fas fa-trash"></i>';
                                echo '</a>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            ?>

                        </table>
                    </div>
                    <div class="card-footer border-top border-info">
                        <!-- <div class="d-flex w-100 justify-content-center align-items-center">
                            <ul class="pagination justify-content-end">
                                <?php
                                // $query1 = "select * from user";
                                // $record1 = mysqli_query($connection, $query1);
                                // $total_records = mysqli_num_rows($record1);
                                // $total_pages = ceil($total_records / $limit);

                                // //pagination button
                                // for ($i = 1; $i <= $total_pages; $i++) {
                                //     echo ' <li class="page-item"><a class="page-link" href="liststaff.php?page=' . $i . '">' . $i . '</a></li>';
                                // }
                                ?>
                            </ul>
                        </div> -->
                    </div>
                    </form>
                </div>
            </div>
    </section>

    <?php
    include "footer.php";
    ?>

<script>
        function checkDelete() {
            return confirm('Are you sure you want to delete this record?');
        }

        //search
        $(document).ready(function() {

            $("#lim").on("change", function() {
                var search = $("#ser").val();
                var lim = $("#lim").val();
                $.ajax({
                    url: "searchstaff.php",
                    type: "POST",
                    data: {
                        search : search,
                        lim : lim
                    },
                    success: function(data) {
                        $("#display").html(data);
                    }
                });
            });

            $("#ser").on("keyup", function() {
                var search = $("#ser").val();
                var lim = $("#lim").val();
                $.ajax({
                    url: "searchstaff.php",
                    type: "POST",
                    data: {
                        search: search,
                        lim : lim
                    },
                    success: function(data) {
                        $("#display").html(data);
                    }
                });
            });
        });
    </script>
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