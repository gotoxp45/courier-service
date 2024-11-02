<?php

$branchid = $_POST["branchid"];
$fname = $_POST["fullname"];
$number = $_POST["number"];
$email = $_POST["email"];
$pass = $_POST["password"];
$role = $_POST["rdrole"];
$ip = $_SERVER["REMOTE_ADDR"];

    include "dbcon.php";

    $query = "insert into user values(NULL,'$fname',$number,'$email','$pass',$role,$branchid,'$ip',1)" or die("query fail");

    if(mysqli_query($connection,$query))
    {
        header("Location: liststaff.php");
    }
    else{
        echo "no";
    }

    mysqli_close($connection);

?>
    <!-- // // if($_POST["rdrole"] == 1)
    // // {
    // //     $branchid = 0;
    // // }
    // // else{
    //     $branchid = $_POST["branchid"];
    // // }
    // $fname = $_POST["fullname"];
    // $number = $_POST["number"];
    // $email = $_POST["email"];
    // $pass = $_POST["password"];
    // $role = $_POST["rdrole"];
    // $ip = $_SERVER["REMOTE_ADDR"];

    // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
    // // include "dbcon.php";

    // $query = "insert into user values('$fname',$number,'$email','$pass',$role,$branchid,'$ip',1)" or die("query fail");

    // // mysqli_query($connection,$query);
    // $result = mysqli_query($connection,$query) or die("not exe");
    // if($result)
    // {
    //     header("Location: liststaff.php"); 
    //     // print_r( $_POST).die();
    //     // echo "pass = $pass";
    // }
    // else{
    //     print_r($query);
    //     }

    // mysqli_close($connection); -->

