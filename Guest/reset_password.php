<?php
session_start();
include('config.php');
include('header.php');
if(isset($_POST['change_password']))
{
	$recipient=$_SESSION['email'];
	$newpass=md5($_POST['cpassword']);
	$change=mysqli_query($con,"UPDATE tbl_customer SET password='$newpass' WHERE email='$recipient'");
	if($change)
	echo "<script> alert('Password changed successfully'); window.location.href='customerlogin.php';</script>";
	else
	echo "<script> alert('Password Changer encountered an error'); window.location.href='forgot_password.php';</script>";
}
?>
<script>
function validate()
{
	var pass_word,cpassword;
	var password_pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$";
	pass_word=document.getElementById('password').value.trim();
	cpassword=document.getElementById('cpassword').value.trim();
	if(pass_word=="")
	{
	document.getElementById('password_error').innerHTML="**Password cannot be empty**";
	document.getElementById('password_error').style.display="block";
	return false;
	}
	if(pass_word.length<8 || pass_word.length>16)
	{
	document.getElementById('password_error').innerHTML="**Password must have length between 8 and 16**";
	document.getElementById('password_error').style.display="block";
	return false;
	}  
	else
	{
	document.getElementById('password_error').style.display="none";
	}
	if(!pass_word.match(password_pattern))
	{
	document.getElementById('password_error').innerHTML="**Password must contain an uppercase letter,a lower case letter, a special character and digit**";
	document.getElementById('password_error').style.display="block";
	return false;
	}
	else
	{
	document.getElementById('password_error').style.display="none";
	}
	if(cpassword=="")
	{
		document.getElementById('cpassword_error').innerHTML="**Password must be confirmed**";
		document.getElementById('cpassword_error').style.display="block";
		return false;
	}
	if(pass_word!=cpassword)
	{
		document.getElementById('cpassword_error').innerHTML="**Password must be confirmed**";
		document.getElementById('cpassword_error').style.display="block";
		return false;
	}
	else{
		document.getElementById('cpassword_error').style.display="none";
		document.geElementById('password_error').style.display="none";
		return true;
	}
}
	</script>
	<br>
	<br>
	<style>
		.password-input{
		margin-left:350px;
		margin-top:25px;
		height:50px;
		}
		.input-class{
		width:300px;
		height:50px;
		margin-left:350px;
		}
		body{
		background:whitesmoke;
		}
		input{
		height:35px;
		width:300px;
		padding-left:40px;
		border:none;
		box-shadow:2px 2px 3px 1px;
		}
        input[type=password]{
            background-color:azure;
        }
		.container{
		margin-top:30px;
		margin-left:35px;
        font-weight:bold;
        font-size:18pt;
        margin-bottom:50px;
		}
		.error_class{
		color:red;
		font-size:12pt;
		font-weight:bolder;
		}
	</style>
	<body>
			<div class="container">
			<form method="post" action="#" onsubmit="return validate()" autocomplete="off">
					<div class="password-input">
						<label>Enter a new Password</label>
					</div>
					<div class="input-class">
						<input type="password" name="password" id="password"  onblur="return validate()" onkeyup="return validate()">
					</div>
					<div class="input-class">
						<span id="password_error" class="error_class"></span>
					</div>
					<div class="password-input">
						<label>Confirm Password</label>
					</div>
					<div class="input-class">
						<input type="password" name="cpassword" id="cpassword" onclick="return validate()" onblur="return validate()" onkeyup="return validate()">
					</div>
					<div class="input-class">
						<span id="cpassword_error" class="error_class"></span>
					</div>
					<div class="input-class">
						<input type="submit" value="submit" name="change_password" style="background-color:B0E0E;color:black;height:30px;border:none; box-shadow:2px 2px 3px 4px; width:fit-content; padding-right:30px;">
					</div>
			</form>
			</div>
<?php
// include('footer.php');
?>