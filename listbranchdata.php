<?php
    //not in use......
    // $connection = mysqli_connect("localhost","root","","project_cms");
    include "dbcon.php";

    $num_per_page = 4;
    
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }
    else{
        $page = 1;
    }
    $start_from = ($page-1)*4;
    $query = "select * from branch limit $start_from,$num_per_page";
    $record = mysqli_query($connection,$query);
    
    echo '<thead class="thead-light">';
    echo '<tr>';
    echo '<th scope="col">Sr no</th>';
    echo '<th scope="col">Street</th>';
    echo '<th scope="col">City/State/Zip/Country</th>';
    echo '<th scope="col">Contact</th>';
    echo '<th scope="col" class="text-center">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $count = 0;
    while(($row = mysqli_fetch_array($record))==true)
    {
        echo '<tr>';
        echo '<th scope="row">'.++$count.'</th>';
        echo '<td>'.$row['street'].'</td>';
        echo '<td>'.$row['city'].','.$row['state'].'-'.$row['zip'].','.$row['country'].'</td>';
        echo '<td>'.$row['contact'].'</td>';
        echo '<td class="text-center">';
        echo '<div class="btn-group">';
        echo '<a href="#" class="btn btn-primary btn-flat">';
        echo '<i class="fas fa-edit"></i>';
        echo '</a>';
        echo '<a href="#" class="btn btn-danger btn-flat">';
        echo '<i class="fas fa-trash"></i>';
        echo '</a>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';

    }
     echo '</tbody>';
?>
