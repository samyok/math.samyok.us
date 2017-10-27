<?php include 'assets/php/common.php' ?>
<!DOCTYPE html>
<html>
<head>
<?php
echo $head;
?>
	<title>Halloween AMC8</title>
</head>
<body class="body">
	<div class="db fixed aspect-ratio--object stars-three"></div>
	<div class="db fixed aspect-ratio--object stars"></div>
	<div class="db fixed aspect-ratio--object stars-two"></div>

	
<div class="hero-image">
  <div class="hero-text">
    <h1>Halloween AMC 8</h1>
    <p>Made by techguy2 and anser.</p>
	<?php if(isset($_SESSION['names'])){echo '<button onclick="returnee();" id="returneeBTN" class="white-hover">View Scores</button>';} else {echo '<button onclick=\'beginTest();\' id="begin" class="white-hover">Begin!</button>';} ?>
  </div>
</div>
<div id="register" class="w3-card-4 w3-white w3-container">

<div class="w3-container">
  <h2>Submit Answers to Halloween Mock AMC 8!</h2>
</div>

<form id="registerForm" class="w3-container" action="login.php" method="POST">
<p>We need some way to contact you. Either give us your real name or your AoPS ID please. :)</p>
<label>Full Name or AoPS Username</label>
<input class="w3-input w3-border w3-light-grey w3-padding w3-hover-grey" name="name" type="text" placeholder="John Doe" required>
<button onclick="$('#registerForm').submit();" class="black-hover" style="float:right;">Next>></button>
</form><?php echo $bodyStuff; ?>
<div class="load" style="display:none;"></div>
</div>
<?php echo $clouds; ?>
</body>
<footer style="height: 100px;"> </footer>
</html>