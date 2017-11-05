<?php
session_start();
if(isset($_GET['password'])){
	$psw=$_GET['password'];
	if($psw != "candyforallandallforcandy"){
		exit();
	}
	echo "<h1>List of all reviews:</h1>";
	$fbackfiles = glob("reviews/*-*");
	foreach ($fbackfiles as $filenameforpsw){
	echo "<a href='$filenameforpsw'>$filenameforpsw</a><br/>";
	} 
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

$sql = "SELECT * FROM 2017_HALLOWEEN_AMC_8";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: ".$row['name']." PASSKEY: <a href='user.php?user=".$row['PASSKEY']. "'>clicky</a><br>";
    }
	if(isset($_GET['removeName'])){
		$rname = $_GET['removeName'];
		
$sql = "UPDATE 2017_HALLOWEEN_AMC_8 SET showLeaderboard=0 WHERE name='".$rname."'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}}

} else {
    echo "0 results";
}
$conn->close();
exit();
}
if(!isset($_POST['favprob']) && !isset($_POST['rating']) && !isset($_POST['impre']) && !isset($_POST['creat'])){
	header("Location: index.php");
	exit();
}
$name= str_replace('/','',stripslashes(htmlspecialchars($_SESSION['names'])));
$fback = $name." said: \n\nMy favorite problem was ".htmlspecialchars($_POST['favprob']).". \n \nI rated the difficulty as ".htmlspecialchars($_POST['rating'])." out of 5. \n \nHow we can improve: ".htmlspecialchars($_POST['impre'])."\n\nCreativity: ".htmlspecialchars($_POST['creat']);
$newfilename = "reviews/".time()."-".$name.".txt";
$newFile = fopen($newfilename, 'w') or die('Sorry! Your feedback was not saved. If there is something you need to tell us, email me at <a href="mailto:samyok@samyok.us">samyok@samyok.us</a>. Click <a href="index.php">here</a> to go back.
<br> <br> Error code: '.$newfilename);

$saaa = fwrite($newFile, $fback);
echo $saaa;
header("Location: index.php");
?>
