<?php
session_start();
$name = NULL;
if(isset($_POST['name'])){
	$name = htmlspecialchars($_POST['name']);
	$_SESSION['name']=$name;
}
if($name === NULL){
	echo "E_NO_NAME_ENTERED";
	exit();
}
echo "<script>$('.hero-image').hide('slow');</script><h1>$name, you may begin.</h1>" ;
echo "<p>Click your answer. Correct answers are worth 1, incorrect ones are worth 0. Click <a href='http://aops.com'>here</a> if you do not have a copy of the test. </p>";
?>