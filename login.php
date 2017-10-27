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
					while($row = $result->fetch_assoc()) {
						echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
					}
				} else {
			if (isset($_SESSION['names'])) {
				if(!in_array($_POST['name'], $_SESSION['names'])){
				$_SESSION['names']=array_push( $_SESSION['names'], $name);
				}
			} else {
				$_SESSION['names'] = array();
				$_SESSION['names']=array_push( $_SESSION['names'], $name);
			}
		}
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
echo '
<button onclick="submitScores();" class="black-hover" style="float:right;">Submit &amp; Score>></button>
';
echo $bodyStuff; 
?>