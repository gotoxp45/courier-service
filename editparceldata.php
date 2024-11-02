<?php
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
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
        $weigth = $_POST["weight"];
        $heigth = $_POST["height"];
        $length = $_POST["length"];
        $width = $_POST["width"];
        $price = $_POST["price"];
    
        $st = $_POST["pst"];
        $rdp = $_POST["rdp"];
    
        $dbranchid = $_POST["delivery"];
        $pbranchid = $_POST["pickup"];
        if($rdp == 1)
        {
            $pbranchid = 0;
        }
    
        // $connection = mysqli_connect("localhost","root","","project_cms") or die("connection fail");
        include "dbcon.php";
        $query = "update parcel set sname='$sname',semail='$semail',saddress='$saddress',scontact=$scontact,rname='$rname',remail='$remail',raddress='$raddress',rcontact=$rcontact,pheight=$heigth,pweight=$weigth,pwidth=$width, plength=$length, pprice=$price, dp=$rdp, dbranchid=$dbranchid, pbranchid=$pbranchid, status=$st where id=$id";
        $result = mysqli_query($connection,$query);
        echo $query;
        if(mysqli_query($connection,$query))
        {
            header("Location: listparcel.php");
        }
        else{
            // echo '<script>';
            // echo 'alert("record not updated!!")';
            // echo '</script>';
            // header("Location: listparcel.php");
            print_r($result);
        }
        mysqli_close($connection);
    
    }
    else{
        header("Location: listparcel.php");
    }
    
?>