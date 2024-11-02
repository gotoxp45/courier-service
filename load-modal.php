<?php
require_once "files.php";


$pid = $_POST["id"];
// $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
include "dbcon.php";
$query = "select * from parcel where id = $pid";
$result = mysqli_query($connection, $query) or die("not execute");
$output = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if ($row['status'] == 1) {
            $st = "parcel accepted";
        } else if ($row['status'] == 2) {
            $st = "shipped";
        } else if ($row['status'] == 3) {
            $st = "out for delivery";
        } else if ($row['status'] == 4) {
            $st = "ready to pickup";
        } else if ($row['status'] == 5) {
            $st = "deliverd";
        } else if ($row['status'] == 6) {
            $st = "picked up";
        } else {
            $st = "not deliverd";
        }
        // $sname = $row['sname'];

        $output .= "
            <div class='container'>
            <div class='row'>
                <div class='col-lg-6'>
                    <h3 class='text-center'>Sender Inforamtion</h3>
                            <hr class='bg-dark'>
                            <p><b>Name :- </b>{$row['sname']}</p>
                            <p><b>Email :- </b>{$row['semail']}</p>
                            <p><b>Address :- </b>{$row['saddress']}</p>
                            <p><b>Contact :- </b>{$row['scontact']}</p>
                    </div>
            
                <div class='col-lg-6'>
                    <h3 class='text-center'>Recevier Information</h3>
                        <hr class='bg-dark'>
                            <p><b>Name :- </b>{$row['rname']}</p>
                            <p><b>Email :- </b>{$row['remail']}</p>
                            <p><b>Address :- </b>{$row['raddress']}</p>
                            <p><b>Contact :- </b>{$row['rcontact']}</p>
                    </div>
                </div>
            <div class='row mt-2'>
                <div class='col-12'>
                    <h3 class='text-center'>Parcel Information</h3>
                    <hr class='bg-dark'>
                    <p><b>Parcel Number :- </b>{$row['pnumber']}</p>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <p><b>Height :- </b>{$row['pheight']}</p>
                            <p><b>Weigth :- </b>{$row['pweight']}</p>
                            <p><b>Length :- </b>{$row['plength']}</p>
                            <p><b>Width :- </b>{$row['pwidth']}</p>
                        </div>
                        <div class='col-sm-6'>
                            <p><b>Price :- </b>{$row['pprice']}</p>
                            <p><b>Status :- </b>{$st}</p>
                            <p><b>Branch From  :- </b>{$row['dbranchid']}</p>
                            <p><b>Branch To :- </b>{$row['pbranchid']}</p>
                        </div>
                    </div>
            </div>  
        </div>
            ";
    }
}

mysqli_close($connection);

echo $output;

?>

<!-- <div class='container'>
                <div class='card responsive '>
                    <div class='card-body '>
                        <div class='row d-flex justify-content-center'>
                            <div class='col-sm-6 col-md-4 col-lg-5 '>
                                <h3 class='text-center'>Sender Inforamtion</h3>
                                <hr class='bg-dark'>
                                <p>Name :- {$row['sname']}</p>
                                <p>Email :- {$row['semail']}</p>
                                <p>Address :- {$row['saddress']}</p>
                                <p>Contact :- {$row['scontact']}</p>
                            </div>
                            <div class='col-sm-6 col-md-4 col-lg-5'>
                                <h3 class='text-center'>Recevier Information</h3>
                                <hr class='bg-dark'>
                                <p>Name :- {$row['rname']}</p>
                                <p>Email :- {$row['remail']}</p>
                                <p>Address :- {$row['raddress']}</p>
                                <p>Contact :- {$row['rcontact']}</pr
                            </div>
                            <br>
                        </div>
                        <div class='row'>
                        <div class='col-sm-12'>
                                <h3 class='text-center'>Parcel Information</h3>
                                <hr class='bg-dark'>
                                <p>Parcel Number :- {$row['pnumber']}</p>
                                <p>Height :- {$row['pheight']} &nbsp;&nbsp;&nbsp;&nbsp;  Weigth :- {$row['pweight']}</p>
                                <p>Length :- {$row['plength']} &nbsp;&nbsp;&nbsp;&nbsp; Width :- {$row['pwidth']}</p>
                                <p>Price :- {$row['pprice']}</p>
                                <p>Status :- {$row['status']}</p>
                                <p>Branch From  :- {$row['dbranchid']}</p>
                                <p>Branch To :- {$row['pbranchid']}</p>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> -->