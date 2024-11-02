<?php
    if(isset($_POST["submit"])){
        $street = $_POST["street"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $contact = $_POST["contact"];
        $ip = $_SERVER["REMOTE_ADDR"];
    
        // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
        include "dbcon.php";
    
        $query = "insert into branch values(NULL,'$street','$city','$state','$country',$zip,$contact,DEFAULT,'$ip')";
    
        if(mysqli_query($connection,$query))
        {
            header("Location: listbranch.php");
        }
        else{
            header("Location: newbranch.php");
        }
    
        mysqli_close($connection);
    }
    else{
        header("Location: newbranch.php");
    }
?>
