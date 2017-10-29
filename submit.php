<?php
//SUBMIT
include 'assets/php/common.php';

if(!isset($_POST['name']) || !isset($_POST['answers'])){
	echo "E_IDK_WHY_U_DO_DIS_TO_ME";
	echo $head;
	exit();
}
	$name=htmlspecialchars($_POST['name']);
	$answers=htmlspecialchars($_POST['answers']);
	$servername = "localhost";
	$username = "root";
	$password = "samyok";
	$dbname = "samyokOnline";
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("E_Connection failed: " . mysqli_connect_error());
		}
	
$sql = "INSERT INTO 2017_HALLOWEEN_AMC_8 (name, answers)
VALUES ('$name', '$answers')";

if ($conn->query($sql) === TRUE) {
    echo "
<h1>Thank you for participating!</h1>
<p>If you would like, could you please leave some feedback? Thanks!</p>
<form action='feedback.php' method='POST'><textarea name='feedback' style='background-color: #f8f8f8;'class='w3-input w3-blue'></textarea>

<button class='black-hover'>Submit</button></form>
";
} else {
    echo "E_" . $sql . "<br>" . $conn->error;
}

$conn->close();



?>