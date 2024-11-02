<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}

$limit = $_POST["lim"];

    // $sst = 50;

    if(isset($_POST["sst"]))
    {
        $sst = $_POST["sst"];
    }
    // $connection = mysqli_connect("localhost", "root", "", "project_cms");
    include "dbcon.php";
    if($sst == 50)
    {
        $query = "select * from parcel limit {$limit}";
        // LIMIT {$offset},{$limit}
    }
    else{
        $query = "select * from parcel where status={$sst} limit {$limit}";
    }
    


$record = mysqli_query($connection, $query) or die("execution fail");
if (mysqli_num_rows($record) > 0) {
    $output = "";
    $output = '
            <thead class="thead-light">
            <tr>
            <th scope="col">Sr no</th>
            <th scope="col">Parcel Number</th>
            <th scope="col">Sender Name</th>
            <th scope="col">Sender Contact</th>
            <th scope="col">Receiver Name</th>
            <th scope="col">Receiver Contact</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>
            <th scope="col">More Information</th>
            <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>

                <tbody>
            ';
                // if (isset($_GET['page'])) {
                //     $page = $_GET['page'];
                //     } else {
                //     $page = 1;
                //     }
                //     $count = 0;
                //     if ($page == 1) {
                //     $count = 0;
                //     } else {
                //     $count = ($page * 4) - 3; 
                //     }         
                $count = 0;   
        while ($row = mysqli_fetch_assoc($record)) {
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
                $st = "deliverd";
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

            $count++;
            $output .= "<tr>
            <th scope='row'> $count </th>
            <td>  {$row['pnumber']}  </td>
            <td>  {$row['sname']}  </td>
            <td>  {$row['scontact']}  </td>
            <td>  {$row['rname']}  </td>
            <td>  {$row['rcontact']}  </td>
            <td>  {$dp}  </td>
            <td>  {$st}  </td>

            <td class='text-center'>
            <a href='' data-backdrop='false' class='btn btn-info btn-flat' data-iid='".$row['id']."' data-toggle='modal' data-target='#myModal'>
            <i class='fas fa-info-circle' ></i>
            </a>

             </td>

            <td class='text-center'>
            <div class='btn-group'>
            <div class='btn-group'>
            <a href='editparcel.php?id=$row[id]' class='btn btn-primary btn-flat'>
            <i class='fas fa-edit'></i>
            </a>
            <a href='deleteparcel.php?id=$row[id]' class='btn btn-danger btn-flat' onclick='return checkDelete()'>
            <i class='fas fa-trash'></i>
            </a>
            </div>
            </td>
            </tr>";
                                 
    }
    $output .= "</tbody>";
    mysqli_close($connection);
    echo $output;
} else {
    echo "No record found!!";
}

?>