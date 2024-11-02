<?php
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
    <title>list parcel</title>
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
                <h1 class="m-0">List Parcel</h1>
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
                        <div class="col-sm-3 form-group mr-auto">
                        <div class="font-weight-bold">Sort by status:</div>
                        <select name="sortst" id="sortst" class="form-control">
                            <option value="50">all data</option>
                            <option value="1">parcel accepted</option>
                            <option value="2">shipped</option>
                            <option value="3">out for delivery</option>
                            <option value="4">ready to pickup</option>
                            <option value="5">deliverd</option>
                            <option value="6">picked up</option>
                            <option value="7">not deliverd</option>
                        </select>
                        </div>
                        <div class="col-sm-3 form-group ml-auto">
                        <div class="font-weight-bold">Search:</div>
                            <input type="text" class="form-control" placeholder="Search" id="ser">
                        </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-xl table-bordered" id="display">
                            <?php
                            // $connection = mysqli_connect("localhost", "root", "", "project_cms");
                            include "dbcon.php";
                            $limit = 20;
                            // if (isset($_GET["page"])) {
                            //     $page = $_GET["page"];
                            // } else {
                            //     $page = 1;
                            // }
                            // $offset = ($page - 1) * $limit; //pagination

                            $query = "select * from parcel LIMIT {$limit}";
                            $record = mysqli_query($connection, $query);

                            echo '<thead class="thead-light">';
                            echo '<tr>';
                            echo '<th scope="col">Sr no</th>';
                            echo '<th scope="col">Parcel Number</th>';
                            echo '<th scope="col">Sender Name</th>';
                            echo '<th scope="col">Sender Contact</th>';
                            echo '<th scope="col">Receiver Name</th>';
                            echo '<th scope="col">Receiver Contact</th>';
                            echo '<th scope="col">Type</th>';
                            echo '<th scope="col">Status</th>';
                            echo '<th scope="col">More Information</th>';
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
                            $count = 1 ;
                            while (($row = mysqli_fetch_array($record)) == true) {
                                if($row['status'] == 1){
                                    $st = "parcel accepted";
                                }
                                else if($row['status'] == 2){
                                    $st = "shipped";
                                }
                                else if($row['status'] == 3){
                                    $st = "out for delivery";
                                }
                                else if($row['status'] == 4){
                                    $st = "ready to pickup";
                                }
                                else if($row['status'] == 5){
                                    $st = "delivered";
                                }
                                else if($row['status'] == 6){
                                    $st = "picked up";
                                }
                                else{
                                    $st = "not deliverd";
                                }
                                
                                if($row['dp'] == 1)
                                {
                                    $dp = "Delivery";
                                }
                                else{
                                    $dp = "Pickup";
                                }
                                echo '<tr>';
                                echo '<th scope="row">' . $count++ . '</th>';
                                echo '<td>' . $row['pnumber'] . '</td>';
                                echo '<td>' . $row['sname'] . '</td>';
                                echo '<td>' . $row['scontact'] . '</td>';
                                echo '<td>' . $row['rname'] . '</td>';
                                echo '<td>' . $row['rcontact'] . '</td>';
                                echo '<td>' . $dp . '</td>';
                                echo '<td>' . $st . '</td>';

                                echo '<td class="text-center">';
                                // echo "<a href='' class='btn btn-info btn-flat' data-iid='".$row['id']."' data-toggle='modal' data-target='#myModal'>";
                                 echo "<button data-backdrop='false' class='btn btn-info btn-flat' data-iid='".$row['id']."' data-toggle='modal' data-target='#myModal'>";
                                echo '<i class="fas fa-info-circle" ></i>';
                                echo '</a>';

                                // echo '<div class="modal">';
                                // echo '</div>';
                                 echo '</td>';

                                echo '<td class="text-center">';
                                echo '<div class="btn-group">';
                                echo '<div class="btn-group">';
                                echo "<a href='editparcel.php?id=$row[id]' class='btn btn-primary btn-flat'>";
                                echo '<i class="fas fa-edit"></i>';
                                echo '</a>';
                                echo "<a href='deleteparcel.php?id=$row[id]' class='btn btn-danger btn-flat' onclick='return checkDelete()'>";
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
                                // $query1 = "select * from parcel";
                                // $record1 = mysqli_query($connection, $query1);
                                // $total_records = mysqli_num_rows($record1);
                                // $total_pages = ceil($total_records / $limit);

                                // pagination button
                                // for ($i = 1; $i <= $total_pages; $i++) {
                                //     echo ' <li class="page-item"><a class="page-link" href="listparcel.php?page=' . $i . '">' . $i . '</a></li>';
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

$(document).ready(function(){

    $(document).on("click",".btn-info", function(e){
        e.preventDefault();
        // $("#myModal").show();
        var iid = $(this).data("iid");

        $.ajax({
            url: "load-modal.php",
            type: "POST",
            data: {id:iid},
            success: function(data){
                $(".modal-body").html(data);
            }

        });

        // $(document).on("click",".cls", function(e){
        // // e.preventDefault();
        // $("#myModal").hide();

        // });
    });

            $("#lim").on("change", function() {
                var sst = $("#sortst").val();
                var lim = $("#lim").val();
                $.ajax({
                    url: "sortparcel.php",
                    type: "POST",
                    data: {
                        sst: sst,
                        lim: lim
                    },
                    success: function(data) {
                        $("#display").html(data);
                    }
                });
            });

            $("#sortst").on("change", function() {
                var sst = $("#sortst").val();
                var lim = $("#lim").val();
                $.ajax({
                    url: "sortparcel.php",
                    type: "POST",
                    data: {
                        sst: sst,
                        lim: lim
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
                    url: "searchparcel.php",
                    type: "POST",
                    data: {
                        search: search,
                        lim: lim
                    },
                    success: function(data) {
                        $("#display").html(data);
                    }
                });
            });

    

            
});


    </script>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header alert-dark">
        <h5 class="modal-title" id="exampleModalLabel">PARCEL INFORMATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer alert-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
</body>
</html>
<?php
    } else {
        // if the session variable is not set, redirect the user to the login page
        header("Location: login.php");
        exit();
    }
?>
