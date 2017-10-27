/* main.js */
function beginTest(){
	$("html, body").animate({ scrollTop: $(document).height() }, 1000);
}
$("#registerForm").submit(function(event){
	$("#register .load").show();
	$("#register form").hide();
	$.post({
		  url: "login.php",
		  data: $(this).serialize()
	})
	.done(function( data ) {
		if(data.charAt(0) === "E"){
			switch(data){
				case "E_NO_NAME_ENTERED":
					toast("snackbar", "red", "Please enter a name");
					$("#register .load").hide();
					$("#register form").show();		
					break;
				default:
					toast("snackbar", "red", data);
					$("#register .load").hide();
					$("#register form").show();	
			}
		} else {
			$("#register .load").hide();
			$("#register").html(data);
		}
	});
	event.preventDefault();
});