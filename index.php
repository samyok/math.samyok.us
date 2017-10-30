<?php include 'assets/php/common.php' ?>
<?php
setcookie("test_cookie", "test", time() + 3600, '/');
?>
<!DOCTYPE html>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {} else {
    echo "Cookies are disabled. Please enable them. ";
	exit();
}

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
	<p style="font-size: 18px">&amp; md123 &amp; SpinTop &amp; popper224...</p>
	<?php if(isset($_SESSION['names'])){echo '<style>body{ overflow: hidden;}</style><button onclick="returnee();" id="returneeBTN" class="white-hover">View Scores</button><button onclick="logout();" id="logoutBTN" class="white-hover">Logout</button>';} else {echo '<button onclick=\'beginTest();\' id="begin" class="white-hover">Begin!</button>';} ?>
  </div>
</div>
<div id="register" class="w3-card-4 w3-white w3-container">

<div class="w3-container">
  <h2>Submit Answers to our <a href="printout.pdf">Halloween Mock AMC 8</a>!</h2>
</div>

<form id="registerForm" class="w3-container" action="login.php" method="POST">
<p>We need some way to contact you. :)</p>
<label>AoPS Username</label>
<input class="w3-input w3-border w3-light-grey w3-padding w3-hover-grey" name="name" type="text" placeholder="techguy2" required>
<button onclick="$('#registerForm').submit();" class="black-hover" style="float:right;">Next>></button>
</form><?php echo $bodyStuff; ?>
<div class="load" style="display:none;"></div>
</div>
<?php echo $clouds; ?>
</body>
<footer style="height: 100px; padding-top: 50px; margin-top: 50px; text-align: center; width: 100%;">Created by techguy2. This website is <a href="https://github.com/nepaltechguy2/math.samyok.us/">open-source!</a><br> Do you want to have a super-cool submission form for your mock test? <a href="mailto:samyok@samyok.us">Email me!</a></footer>
</html>