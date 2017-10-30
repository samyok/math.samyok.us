<?php
include 'assets/php/common.php';
if(!isset($_GET['user'])){
	header("Location: index.php");
	exit();
}
$psw = htmlspecialchars($_GET['user']);


$servername = "localhost";
$username = "root";
$password = "samyok";
$dbname = "samyokOnline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name FROM 2017_HALLOWEEN_AMC_8 WHERE PASSKEY='$psw'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['names'] = $row["name"];
    }
} else {
    echo "Wrong Passkey.";
	exit();
}
$conn->close();


?>