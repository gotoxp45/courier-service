<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}
// almost same like liststaff php section where data are shown
$_POST["search"];
$search = $_POST["search"];
$limit = $_POST["lim"];

// if (isset($_GET["page"])) {
//     $page = $_GET["page"];
// } else {
//     $page = 1;
// }
// $offset = ($page - 1) * $limit;

// $connection = mysqli_connect("localhost", "root", "", "project_cms");
include "dbcon.php";

    $query = "select * from user where fname like '%{$search}%' or email like '%{$search}%' or branchid like '%{$search}%' or contact like '%{$search}%' LIMIT {$limit}";
    
$record = mysqli_query($connection, $query);
if (mysqli_num_rows($record) > 0) {
    $output = "";
    $output = '
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Sr no</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Branch Id</th>
                    <th scope="col">Contact</th>
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
            $count++;
            $output .= "<tr> 
                            <td scope='row' class='font-weight-bold'>$count</td>
                            <td>{$row['fname']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['branchid']}</td>
                            <td>{$row['contact']}</td>
                            <td class='text-center'>
                            <div class='btn-group'>
                            <a href='editstaff.php?id=$row[id]' class='btn btn-primary btn-flat'>
                            <i class='fas fa-edit'></i>
                            </a>
                            <a href='deletestaff.php?id=$row[id]' class='btn btn-danger btn-flat' onclick='return checkDelete()'>
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