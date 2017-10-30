<?php
include 'assets/php/common.php';
$name = NULL;
if(isset($_POST['name'])){
	$name = htmlspecialchars($_POST['name']);
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

		$sql = "SELECT * FROM 2017_HALLOWEEN_AMC_8 WHERE name='$name'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			echo "E_USER_TAKEN";
			exit();
		} else {
			$_SESSION['tempname']=$name;
		}
}
if($name === NULL){
	echo "E_NO_NAME_ENTERED";
	exit();
}
echo "<script>$('html, body').animate({ scrollTop: 0 }, 1000);$('.hero-image').hide('slow');</script><div id='loadanswer' class=\"load\" style=\"display:none;\"></div>
</div><div id='answerSheethide'><h1>$name, you have 40 minutes. Begin.</h1>" ;
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
echo '
</ol>
<input class="w3-checkbox" type="checkbox" checked><p> I consent to having my score viewed publicly and to be added on the leaderboard. </p>
<button onclick="submitScores(\''.$name.'\',answers.toString());" class="black-hover" style="float:right;">Submit &amp; Score>></button></div>
';
echo $bodyStuff; 
?>