<?php include 'assets/php/common.php' ?>
<!DOCTYPE html>
<html>
<head>
<?php
echo $head;
?>
	<title>Halloween AMC8</title>
</head>
<body>
	<div class="background"></div>
	<div class="db fixed aspect-ratio--object stars-three"></div>
	<div class="db fixed aspect-ratio--object stars"></div>
	<div class="db fixed aspect-ratio--object stars-two"></div>

	
<div class="hero-image">
  <div class="hero-text">
    <h1>Halloween AMC 8</h1>
    <p>Made by techguy2 and anser</p>
    <button onclick='beginTest();' id="begin" class="white-hover">Begin!</button>
  </div>
</div>
<div id="register" class="w3-card-4 w3-white w3-container">

<div class="w3-container">
  <h2>Submit Answers to Halloween Mock AMC 8!</h2>
</div>

<form class="w3-container" action="login.php" method="POST">
<p>We need some way to contact you. Either give us your real first name or your AoPS Id please. :)</p>
<label>Full Name or AoPS Username</label>
<input class="w3-input w3-border w3-light-grey" name="name" type="text">
<button onclick="submitName();" class="black-hover" style="float:right;">Next>></button>
</form>
<div class="load"></div>
</div>
<?php echo $clouds; fmodtime("index.php"); ?>
</body>
<footer style="height: 100px;"> </footer>
</html>