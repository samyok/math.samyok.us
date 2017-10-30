<?php
/* THIS IS THE COMMON FILE
	LOGINS, SESSIONS, SNACKBARS, 
	CAN ALL BE SERVED FROM HERE. 
	
	INCLUDE THIS WITH 
		include("assets/php/common.php")

	+---------------------------+
	|     TABLE OF CONTENTS     |
	|							|
	|	0. IMPORTANT RULES		|
	|	1. Login/SESSIONS		|
	|	2. Header/Body			|
	|	3. Custom PHP Commands	|
	|							|
	+---------------------------+
*/

/* |	0. IMPORTANT RULES		| */
date_default_timezone_set("America/Chicago");

/* |	1. Login/SESSIONS		| */
session_start();

$loggedin=FALSE;
$username="";
$isAdmin = FALSE;

if(isset($_SESSION['user'])){ // get session vars and set vars to them
	$loggedin=TRUE;
	$username=$_SESSION['user'];
	// TODO check admin table
}
if(isset($_SESSION['admin'])){
	$isAdmin = TRUE;
}

/* |	2. Header/body			| */

$bodyStuff = '<div id="snackbar">Loading...</div>
<script>
function toast(elem,color,msg){
	var x=document.getElementById(elem);
	x.className="show";
	x.style.backgroundColor=color;
	$("#"+elem).html(msg);
	setTimeout(function(){x.className=x.className.replace("show","")},3000)}
</script>
<script src="assets/js/main.js"></script>'
;
$head = '
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Chewy|Crete+Round" rel="stylesheet">
';
 
$clouds = '
<div id="Clouds">
  <div class="Cloud Foreground"></div>
  <div class="Cloud Background"></div>
  <div class="Cloud Foreground"></div>
  <div class="Cloud Background"></div>
  <div class="Cloud Foreground"></div>
  <div class="Cloud Background"></div>
  <div class="Cloud Background"></div>
  <div class="Cloud Foreground"></div>
  <div class="Cloud Background"></div>
  <div class="Cloud Background"></div>
<!--  <svg viewBox="0 0 40 24" class="Cloud"><use xlink:href="#Cloud"></use></svg>-->
</div>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="40px" height="24px" viewBox="0 0 40 24" enable- xml:space="preserve">
  <defs>
    <path id="Cloud" d="M33.85,14.388c-0.176,0-0.343,0.034-0.513,0.054c0.184-0.587,0.279-1.208,0.279-1.853c0-3.463-2.809-6.271-6.272-6.271
	c-0.38,0-0.752,0.039-1.113,0.104C24.874,2.677,21.293,0,17.083,0c-5.379,0-9.739,4.361-9.739,9.738
	c0,0.418,0.035,0.826,0.084,1.229c-0.375-0.069-0.761-0.11-1.155-0.11C2.811,10.856,0,13.665,0,17.126
	c0,3.467,2.811,6.275,6.272,6.275c0.214,0,27.156,0.109,27.577,0.109c2.519,0,4.56-2.043,4.56-4.562
	C38.409,16.43,36.368,14.388,33.85,14.388z"/>
  </defs>
</svg>
';

/* |	3. Custom PHP Commands	| */
function admin($q, $o, $of){
	if($q){
		echo $o;
	} else {
		echo $of;
	}
}
function fmodtime($fn){ //return file last modified
	echo "<div id='filelastmodified' title='This could be off for a large number of reasons.' style='cursor: pointer; background-color: yellow; width: 100%; font-weight: bold; position: fixed; bottom: 0; padding: 10px;' onclick='$(\"#filelastmodified\").hide(\"fast\");'>This page was last modified at ".date('Y-m-d H:i:s', filemtime($fn)).". Click here to close.<span style='float: right;'>&times;</span></div>";
}

$homebtn = "<button onclick='window.location.reload()' class='black-hover'>Home</button>";


?>