<?php

    $id = $_POST["id"];
    $fullname = $_POST["fullname"];
    $contact = $_POST["number"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
    include "dbcon.php";
    $query = "update user set fname='$fullname', contact='$contact', email='$email',password='$password' where id=$id";

    if(mysqli_query($connection,$query))
    {
        echo '<script>';
        echo 'alert("record updated successfully")';
        echo '</script>';
        header("Location: login.php");
    }
    else{
        echo '<script>';
        echo 'alert("record not updated!!")';
        echo '</script>';
        header("Location: login.php");
    }
    mysqli_close($connection);

?>