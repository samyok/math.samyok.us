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
$_SESSION['names'] = $name;
    echo "
<h1>Thank you for participating!</h1>
<p>If you would like, could you please leave some feedback? Thanks!</p>
<form action='feedback.php' method='POST'>
<p><b>How creative were the problems? </b></p>
<input name='creat' class='w3-input w3-border w3-hover-red' type='text'>
<p><b>What was your overall impression of the Halloween AMC 8? </b></p>
<input name='impre' class='w3-input w3-border w3-hover-red' type='text'>
<p><b>What was your favorite problem of the Halloween AMC 8? </b></p>
<input name='favprob' class='w3-input w3-border w3-hover-red' type='text'>
<p>Please rate us on difficulty:</p>
  <select class='w3-select' id='rating' name='rating'>
	<option value="" disabled selected>--Choose your option--</option>
    <option value='1'>Wayyy too easy.</option>
    <option value='2'>Easier than normal.</option>
    <option value='3'>Wow! This could have been the 2017 AMC 8.</option>
	<option value='4'>Harder than normal.</option>
	<option value='5'>Wayyy too hard</option>
  </select>
<br>
<button class='black-hover'>Submit</button></form>
";
} else {
    echo "E_" . $sql . "<br>" . $conn->error;
}

$conn->close();



?>