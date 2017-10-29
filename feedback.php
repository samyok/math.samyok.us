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
exit();
}
if(!isset($_POST['favprob']) && !isset($_POST['rating']) && !isset($_POST['impre']) && !isset($_POST['creat'])){
	header("Location: index.php");
	exit();
}
$name= stripslashes(htmlspecialchars($_SESSION['names']));
$fback = $name." said: \n\nMy favorite problem was ".htmlspecialchars($_POST['favprob']).". \n \nI rated the difficulty as ".htmlspecialchars($_POST['rating'])." out of 5. \n \nHow we can improve: ".htmlspecialchars($_POST['impre'])."Creativity: ".htmlspecialchars($_POST['creat']);
$newfilename = time()."-".$name.".txt";
$newFile = fopen($newfilename, 'w') or die('Sorry! Your feedback was not saved. If there is something you need to tell us, email me at <a href="mailto:samyok@samyok.us">samyok@samyok.us</a>. Click <a href="index.php">here</a> to go back.
<br> <br> Error code: '.$newfilename);

fwrite($newfile, $fback);
header("Location: index.php");
?>