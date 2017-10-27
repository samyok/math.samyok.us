<?php include 'assets/php/common.php' ?>
<!DOCTYPE html>
<html>
<head>
<?php
session_start();
echo $head;
?>
	<title>Halloween AMC8</title>
</head>
<body>

<div class="w3-card-4 w3-white w3-container">

<div class="w3-container w3-dark-red">
  <h2>Submit Answers to Halloween Mock AMC 8!</h2>
</div>

<form class="w3-container" action="login.php" method="POST">

<label>First Name</label>
<input class="w3-input" type="text">

<label>Last Name</label>
<input class="w3-input" type="text">

</form>

</div>
<?php echo $clouds; fmodtime("index.php"); ?>
</body>
</html>