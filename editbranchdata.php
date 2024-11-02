<?php
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $street = $_POST["street"];
        $country = $_POST["country"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $contact = $_POST["contact"];
        $city = $_POST["city"];
    
        // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
        include "dbcon.php";
        $query = "update branch set street='$street',country='$country',state='$state',zip=$zip,contact=$contact,city='$city' where id=$id";
    
        if(mysqli_query($connection,$query))
        {
            echo '<script>';
            echo 'alert("record updated successfully")';
            echo '</script>';
            header("Location: listbranch.php");
        }
        else{
            echo '<script>';
            echo 'alert("record not updated!!")';
            echo '</script>';
            header("Location: listbranch.php");
        }
        mysqli_close($connection);
    }
    else{
        header("Location: listbranch.php");
    }

?>