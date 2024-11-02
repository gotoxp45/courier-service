<?php
    // start the session
    session_start();

    // get the email and password values from the form
    $email = $_POST["email"];

    // include the database connection file
    include "dbcon.php";

    // construct the SQL query
    $query = "SELECT * FROM parcel WHERE semail='$email' or remail='$email'";

    // execute the SQL query
    $result = mysqli_query($connection, $query);

    // get the number of rows returned by the query
    $count = mysqli_num_rows($result);

    // check if the email and password are correct
    if ($count == 1) {
        // fetch the user data from the query result
        // $row = mysqli_fetch_assoc($result);

        // set the session variables
        // $_SESSION["fname"] = $row["fname"];

        // redirect the user to the index page
        header("Location: test.php");
        exit();
    } else {
        echo "<script>alert('invalid email');
        window.location.href = 'tracklogin.php';
        </script>
        ";
    }

    // close the database connection
    mysqli_close($connection);
?>
