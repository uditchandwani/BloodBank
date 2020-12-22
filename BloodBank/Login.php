<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		function roleCheck() {
			var role=document.getElementById("checkRole").value;
			document.getElementById("signUpLink").href=role+"SignUp.php";

			
		}
	</script>
</head>
<body id="grey_body">
<div id="login_main">
    <h1><a href="index.php">Blood Bank</a></h1>
	<p id="login_sub_head">Log in to Your Account</p>
        <form action="CheckingLoginCredentials.php" method="POST">
		<input type="text" name="Email" placeholder="Email" title="Please enter your email" required><br>
		<input type="password" name="pwd" placeholder="Password" title="Please enter your password" required><br>
		<select name="Role" id="checkRole" onchange="roleCheck()">
			<option value="Receiver"  selected>Receiver</option>
			<option value="Hospital">Hospital</option>
		</select><br>
                <button type="submit" name="submit" value="Submit">Log In</button> 
	</form>
	<p>Don't have an account?<a href="ReceiverSignUp.php" id="signUpLink">Create here</a></p>
	
</div>
</body>
</html>