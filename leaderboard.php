<?php
include 'assets/php/common.php';

$psw = htmlspecialchars($_GET['user']);


$servername = "localhost";
$username = "root";
$password = "samyok";
$dbname = "samyokOnline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("E_Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name, answers FROM 2017_HALLOWEEN_AMC_8 WHERE showLeader='1'";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {   // output data of each row
    echo "<h1>Leaderboard: </h1><table><tr><th>Name</th><th>Score</th></tr>";
while($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["name"]."</td><td>$score</td></tr>";
    }
echo "</table>"
} else {
    echo "No one here :'( ";
	exit();
}
$conn->close();


?>