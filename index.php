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
	<div class="db fixed aspect-ratio--object stars-three"></div>
	<div class="db fixed aspect-ratio--object stars"></div>
	<div class="db fixed aspect-ratio--object stars-two"></div>

	
<div class="hero-image">
  <div class="hero-text">
    <h1>I am John Doe</h1>
    <p>And I'm a Photographer</p>
    <button>Hire me</button>
  </div>
</div>
<div class="w3-card-4 w3-white w3-opacity w3-container">

<div class="w3-container">
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