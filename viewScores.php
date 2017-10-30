<?php
include 'assets/php/common.php';

if(!isset($_SESSION['names'])){header("Location: index.php"); exit();}
$name= htmlspecialchars($_SESSION['names']);

$servername = "localhost";
$username = "root";
$password = "samyok";
$dbname = "samyokOnline";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("E_Connection_failed_" . $conn->connect_error);
} 

$sql = "SELECT * FROM 2017_HALLOWEEN_AMC_8 WHERE name='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<script>$('html, body').animate({ scrollTop: 0 }, 1000);$('.hero-image').hide('slow');</script><style>body{overflow: auto}</style>";
    while($row = $result->fetch_assoc()) {
        echo "
			<h1>Hello again, ".$row["name"].".</h1>";
		if($row['showLeaderboard']===0){echo "
			<p>You have chosen <b>NOT</b> to show your name on the leaderboard. To change this, you will need to either <a href='samyok@samyok.us'>email me</a> or PM me (techguy2). </p>";
		}
		$correctAnswers = "B, B, D, C, D, C, D, D, A, B, E, C, E, A, D, D, E, D, B, D, E, A, D, C, E";
		$correctAnswers = str_split(str_replace(' ','', str_replace( ',', '', $correctAnswers )),1);
		$answers = str_split(str_replace(' ','', str_replace( ',', '', $row["answers"] )),1);
$score=0;
echo "<ol>";
$i=0;
		while($i<25){
$correctNow = $correctAnswers[$i];
$answeredNow = $answers[$i];
$A = ""; $B = ""; $C = ""; $D = ""; $E = "";
switch($answeredNow){
	case "A": $A = $A." active "; break;
	case "B": $B = $B." active "; break;
	case "C": $C = $C." active "; break;
	case "D": $D = $D." active "; break;
	case "E": $E = $E." active "; break;
	default: $A = $B = $C = $D = $E = "w3-yellow"; break;
}
if($correctNow === $answeredNow){$score++;}else{
switch($correctNow){
	case "A": $A = $A." correct "; break;
	case "B": $B = $B." correct "; break;
	case "C": $C = $C." correct "; break;
	case "D": $D = $D." correct "; break;
	case "E": $E = $E." correct "; break;
	default: $A = $B = $C = $D = $E = ""; break;
}
}

echo '<li><div id="problem'.$i.'" class="problem-options">
		<button class="option '.$A.'" disabled>A</button>
		<button class="option '.$B.'" disabled>B</button>
		<button class="option '.$C.'" disabled>C</button>
		<button class="option '.$D.'" disabled>D</button>
		<button class="option '.$E.'" disabled>E</button>
	</div></li>';
	$i++;
	}
}
echo "</ol>";
echo "<h2>You got $score/25. Congrats!</h2>
<button class='black-hover' onclick='window.location.href=".'"index.php">Back<\button>';
} else {
    echo "We don't have any submissions for you. :'(";
}
$conn->close();