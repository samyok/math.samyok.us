<?php
include 'assets/php/common.php';
$name = NULL;
if(isset($_POST['name'])){
	$name = htmlspecialchars($_POST['name']);
	$_SESSION['name']=$name;
}
if($name === NULL){
	echo "E_NO_NAME_ENTERED";
	exit();
}
echo "<script>$('html, body').animate({ scrollTop: 0 }, 1000);$('.hero-image').hide('slow');</script><h1>$name, you have 45 minutes. Begin.</h1>" ;
echo "<p>Click your answer. Correct answers are worth 1, incorrect ones are worth 0. Click <a href='http://aops.com'>here</a> if you do not have a copy of the test. </p>";
echo "<ol>";
$i = 1;
while ($i <26) {
	echo '<li><div id="problem'.$i.'" class="problem-options">
		<button class="option">A</button>
		<button class="option">B</button>
		<button class="option">C</button>
		<button class="option">D</button>
		<button class="option">E</button>
	</div></li>';
	$i++;
}
echo $bodyStuff; 
?>