<?php
include "assets/php/common.php";
if(isset($_GET['password'])){
	$psw=$_GET['password'];
	if($psw != "candyforallandallforcandy"){
		exit();
	}
	echo "<head>".$head."<title>Feedback Page</title></head>".'<body class="body">
	<div class="db fixed aspect-ratio--object stars-three"></div>
	<div class="db fixed aspect-ratio--object stars"></div>
	<div class="db fixed aspect-ratio--object stars-two"></div><div id="register" class="w3-card-4 w3-white w3-container">';
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
echo "<table style='color: black'><tr><th>ID</th><th>Name</th><th>Passkey</th></tr>";
if ($result->num_rows > 0) {
    // output data of each row
	$ndata = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$ndata."</td><td>".$row['name']."</td><td><a href='user.php?user=".$row['PASSKEY']. "'>".$row['PASSKEY']. "</a></td></tr>";
	$ndata++;    
    }
	if(isset($_GET['removeName'])){
		$rname = $_GET['removeName'];
		
$sql = "UPDATE 2017_HALLOWEEN_AMC_8 SET showLeaderboard=0 WHERE PASSKEY='".$rname."'";

if ($conn->query($sql) === TRUE) {
    echo "<br>Record updated successfully";
} else {
    echo "<br>Error updating record: " . $conn->error;
}}
echo "</table></div>".$bodyStuff.$clouds.'<div class="load" style="display:none;"></div>

<footer style="height: 100px; padding-top: 50px; margin-top: 50px; text-align: center; width: 100%;">Created by techguy2. This website is <a href="https://github.com/nepaltechguy2/math.samyok.us/">open-source!</a><br> Do you want to have a super-cool submission form for your mock test? <a href="mailto:samyok@samyok.us">Email me!</a></footer>
</body></html>';
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
