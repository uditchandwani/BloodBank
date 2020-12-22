<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" language="JavaScript">
		function formSubmit() 
		{
			var num=document.myForm.Phone.value;
		    if(!num.match(/^\d{10}$/))
			{
	        	alert("Enter valid phone number");
	        	return false;
	        }
	        var pwd=document.myForm.pwd.value;
	        var re_pwd=document.myForm.re_pwd.value;
	        if(!(pwd==re_pwd))
	        {
	        	alert("Password did not match");
	        	return false;
	        }
	        return true;
        	
		    
		}
	</script>
</head>
<body id="grey_body">
<div id="login_main">
	<h1>Blood Bank</h1>
	<p id="login_sub_head">Create Your Account As A Hospital</p>
        <form name="myForm" action="RegisterHospital.php" method="POST" onSubmit="return formSubmit()">
		<input type="text" name="Name" placeholder="Name" title="Please enter your name" required><br>
		<input type="text" name="Email" placeholder="Email" title="Please enter your email" required><br>
		<input type="number" id="num" name="Phone" placeholder="Phone Number" title="Please enter your phone number" required><br>
		<textarea name="Address" placeholder="Address" title="Please enter your address"></textarea><br>
		<input type="password" name="pwd" placeholder="Password" title="Please enter your password" required><br>
		<input type="password" name="re_pwd" placeholder="Confirm Password" title="Please re-enter your password" required><br>
		<button type="submit" name="submit" value="Submit">Sign Up</button> 
	</form>
	<p>Sign Up as a Receiver?<a href="ReceiverSignUp.php">Create here</a></p>
	<p>Already have an account?<a href="Login.php">Log in here</a></p>
	
</div>
</body>
</html>