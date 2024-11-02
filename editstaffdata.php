<?php
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
        $fullname = $_POST["fullname"];
        $contact = $_POST["number"];
        $email = $_POST["email"];
        $branch = $_POST["branchid"];
        $password = $_POST["pass"];
        $role = $_POST["rdrole"];
    
        // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
        include "dbcon.php";
        $query = "update user set fname='$fullname', contact='$contact', email='$email',password='$password', role='$role', branchid='$branch' where id=$id";
    
        if(mysqli_query($connection,$query))
        {
            echo '<script>';
            echo 'alert("record updated successfully")';
            echo '</script>';
            header("Location: liststaff.php");
        }
        else{
            echo '<script>';
            echo 'alert("record not updated!!")';
            echo '</script>';
            header("Location: liststaff.php");
        }
        mysqli_close($connection);
    }
    else{
        header("Location: liststaff.php");
    }
    

?>