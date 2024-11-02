<?php
    //SENDER INFORMATION
    $sname = $_POST["sfullname"];
    $semail = $_POST["semail"];
    $saddress = $_POST["saddress"];
    $scontact = $_POST["snumber"];

    //RECEVIER INFORMATION
    $rname = $_POST["rfullname"];
    $remail = $_POST["remail"];
    $raddress = $_POST["raddress"];
    $rcontact = $_POST["rnumber"];

    //PARCEL INFORMATION
    $pnumber = rand();
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $lenght = $_POST["length"];
    $width = $_POST["width"];
    $price = $_POST["price"];

    
    $rdp = $_POST["rdp"];
    // if(!$rdp == 2){
        // $pbranchid = $_POST["pickup"];
    // }
    // else{
        $dbranchid = $_POST["delivery"];
        $pbranchid = $_POST["pickup"];
    // }
    if($rdp == 1)
    {
        $pbranchid = 0;
    }
    

    // $branchid = $_POST["branchid"];
    // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
    include "dbcon.php";
    $query = "insert into parcel values(NULL,'$sname','$semail','$saddress',$scontact,'$rname','$remail','$raddress',$rcontact,$pnumber,$height,$weight,$width,$lenght,$price,$rdp,$dbranchid,$pbranchid,1,DEFAULT)";

    if(mysqli_query($connection,$query))
    {
        header("Location: listparcel.php");
    }
    else{
        header("Location: newparcel.php");
    }

    mysqli_close($connection);

?>