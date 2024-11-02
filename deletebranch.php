<?php
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
        $query = "delete from branch where id=$id";
        mysqli_query($connection,$query);
        mysqli_close($connection);
        header("Location: listbranch.php");
    }
    else{
        header("Location: listbranch.php");
    }

?>