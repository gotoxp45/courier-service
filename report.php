<?php
    // start the session
    // session_start();
    // if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    if (!isset($_SESSION)) {
        session_start();
    }

    // check if the session variable is set
    if (isset($_SESSION["userid"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <?php
        require_once "files.php";
    ?>
    
</head>
<body>
<?php
        if($_SESSION["role"] == 1)
        {
            include "header1.php";
        }
        if($_SESSION["role"] == 2){
            include "header2.php";
        }
    ?>

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Generate Report</h1>
            </div>
        </div>
        <hr class="border-primary">
    </div>

    <div class="container">
    <form action="report1.php" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <label>Start Date</label>
            <input type="date" name="stdt" min="" id="stdt" class="form-control" required>
        </div>
        <div class="col-sm-6">
            <label for="">End Date</label>
            <input type="date" name="eddt" min="" id="eddt" class="form-control" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-12">
            <input type="submit" name="submit" class="btn btn-success form-control" value="Generate CSV report">
        </div>
    </div>
    </form>
    </div>

    <?php
        require_once "footer.php";
    ?>
    <script>
        const today = new Date();
        const year = today.getFullYear();
        const month = (today.getMonth() + 1).toString().padStart(2, '0');
        const day = today.getDate().toString().padStart(2, '0');
        const maxDate = `${year}-${month}-${day}`;
        document.getElementById('stdt').setAttribute('max', maxDate);

        $("#stdt").on("change",function(){
            
            var a = document.getElementById('stdt').value;
            // alert(a);
            document.getElementById('eddt').setAttribute('min', a);
            document.getElementById('eddt').setAttribute('max',maxDate );
        });
    </script>
</body>
</html>
<?php
    } else {
        // if the session variable is not set, redirect the user to the login page
        header("Location: login.php");
        exit();
    }
?>
