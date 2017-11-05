<?php
include 'assets/php/common.php';

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

$sql = "SELECT name, answers FROM 2017_HALLOWEEN_AMC_8 WHERE showLeaderboard=1";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {   // output data of each row
    echo "<h1>Leaderboard: </h1><table id='myTable'><tr><th onclick='sortTable(0)'>Name</th><th onclick='sortTable(1)'>Score</th></tr>";
	while($row = $result->fetch_assoc()) {
		$correctAnswers = "B, B, D, C, D, C, D, D, A, B, E, C, E, A, D, B, E, D, B, D, E, A, D, C, E";
		$correctAnswers = str_split(str_replace(' ','', str_replace( ',', '', $correctAnswers )),1);
		$answers = str_split(str_replace(' ','', str_replace( ',', '', $row["answers"] )),1);
		$score=0;
		$i=0;
		while($i<25){
			$correctNow = $correctAnswers[$i];
			$answeredNow = $answers[$i];
			if($correctNow === $answeredNow){$score++;}
			$i++;
		}

        echo "<tr><td>". $row["name"]."</td><td>$score</td></tr>";
}
echo "</table>";
echo '<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
sortTable(1);sortTable(1);
</script>
';
} else {
    echo "No one here :'( ";
	exit();
}
$conn->close();


?>
