<?php

if(isset($_POST["submit"]))
{
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project_cms';


$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
$start = $_POST["stdt"];
$end = $_POST["eddt"];

// Fetch data from the database
$stmt = $pdo->query("SELECT sname,semail,saddress,scontact,rname,remail,raddress,rcontact,pnumber,pheight,pweight,pwidth,plength,pprice,dp,date FROM parcel WHERE date BETWEEN '$start' AND '$end'");
//WHERE date BETWEEN '$start' AND '$end'
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Set up the CSV file
$filename = 'report.csv';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Open a file pointer to the output stream
$output = fopen('php://output', 'w');

// Write the header row
$header = array("Sender name","Sender email","Sender address","sender contact","Reciver name","Reciver email","Reciver address","Reciver contact","Parcel number","Parcel height","Parcel weight","Parcel width","Parcel length","Parcel price","Type","Date");
fputcsv($output, $header);

// Write the data rows
foreach ($rows as $row) {
    if($row["dp"] == 1)
    {
        $row["dp"] = "Deliver";
    }
    else{
        $row["dp"] = "pickup";
    }
    fputcsv($output, $row);
}

// Close the file pointer
fclose($output);
}
else{
    header("Location: report.php");
}

?>