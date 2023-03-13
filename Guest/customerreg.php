<?php
include("header.php");
include("config.php");
?>
<html>
<head>
	<style>
		span{
			color:red;
		}
	</style>
</head>
<body>
<form action="customerReg_action.php"  method="post" onsubmit="return validate()">
<div class="container" style="margin-left:250px;padding-bottom:150px;padding-top: 7%;">
   	<div class="row">
            <div class="col-md-11" style="box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px;">
                <h3 style="text-align: center">Customer Registration</h3>
               
                	<div class="form-horizontal">

					<div class="form-group" style="margin-top:10px;">
                        		<label class="control-label col-sm-2"  >First Name</label>
                         <div class="col-sm-10">
                           	<input type="text" id="fname" name="fname" onclick="return validate()" class="form-control" autocomplete="off" onkeyup="return validate()" onblur="return validate()" />
                            
                        	</div>
							<div>
								<span id="fname_error"></span>
							</div>
                    	</div>
						<div class="form-group" style="margin-top:10px;">
                        		<label class="control-label col-sm-2"  >Last Name</label>
                         <div class="col-sm-10">
                           	<input type="text" id="lname" name="lname" onclick="return validate()"  class="form-control" autocomplete="off" onkeyup="return validate()" onblur="return validate()" />
                            
                        	</div>
							<div>
								<span id="lname_error"></span>
							</div>
	</div>

								
						<div class="form-group" style="margin-top:10px;">
                        		<label class="control-label col-sm-2" for="course_name">Phone Number</label>
                         <div class="col-sm-10">
                           	<input type="text" id="phone" maxlength="10" name="phone" onclick="return validate()" class="form-control" autocomplete="off" onkeyup="return validate()" onblur="return validate()"/>
                            
                        	</div>
							<div>
								<span id="phone_error"></span>
							</div>
                    	</div>    

				
						<div class="form-group" style="margin-top:10px;">
                        		<label class="control-label col-sm-2" for="course_name">Email</label>
                         <div class="col-sm-10">
                           <input type="text" id="email" name="email" onclick="return validate()" class="form-control" autocomplete="off" onkeyup="return validate()" onblur="return validate()"/>
                            
                        	</div>
							<div>
								<span id="email_error"></span>
							</div>
                    	</div>
	

						<div class="form-group" style="margin-top:10px;">
                        		<label class="control-label col-sm-2" for="course_name">Password</label>
                         <div class="col-sm-10">
                         <input type="password" id="password" onclick="return validate()" class="form-control"  name="password" autocomplete="off" onkeyup="return validate()" onblur="return validate()"/>
                        	</div>
							<div>
								<span id="password_error"></span>
							</div>
                    	</div>     
              
                        
                        <div class="form-group" style="margin-top:10px;">
                        		<label class="control-label col-sm-2" for="course_name">Confirm Password</label>
                         <div class="col-sm-10">
                         <input type="password" id="cpassword"  class="form-control" name="cpassword" autocomplete="off" onkeyup="return validate()" onblur="return validate()"/>
                            
                        	</div>
							<div>
								<span id="cpassword_error"></span>
							</div>
                    	</div>

                   <div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-6">
                         </div>
                         		<div class="col-sm-6">
					<input type="submit" name="btnSave" id="signup" value="Register" value="Save" class="btn btn-danger" style="width:100px; height:35px;" onclick=" return validate()">
                   </div>

				   <div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-6">
                         </div>
                         		<div class="col-sm-6">

                    <div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-6">
                         </div>
					<input type="reset" value="CLEAR" id="clear" name="clear">  
                </div>
                </div>

				<div class="form-group" style="margin-top:10px;">
                        <div class="col-sm-6">
                         </div>
                         		<div class="col-sm-6">

					<p>Already have an account? <a href="customerlogin.php">login now</a></p>
</div>
</div>

	</form>
	</div>
                        		</div>
                        
					</div>
			</div>
		</div>
</div>
</form>
</body>
<script>
        function validate()
         {
             var fname,lname,email,password,cpassword,phone;
			 var x =document.getElementById('password').value;
             var y =document.getElementById('cpassword').value;
             fname=document.getElementById('fname').value;
             lname=document.getElementById('lname').value;
             email=document.getElementById('email').value;
             phone=document.getElementById('phone').value;
             password=document.getElementById('password').value;
             cpassword=document.getElementById('cpassword').value;
              if(fname=="")
             {
                 document.getElementById('fname_error').innerHTML="**Enter your first name**";
				 document.getElementById('fname_error').style.display="block";
                 return false;
             }
			 else
			 {
				document.getElementById('fname_error').style.display="none";
			 }
             if(/^[a-zA-Z]+$/.test(fname) == false)
             {  
                 document.getElementById('fname_error').innerHTML="**Please enter a valid first name**";
				 document.getElementById('fname_error').style.display="block";
                 return false;
             }
			 else
			 {
				document.getElementById('fname_error').style.display="none";
			 }


			 if(lname=="")
             {
                 document.getElementById('lname_error').innerHTML="**Enter your last name**";
				 document.getElementById('lname_error').style.display="block";
                 return false;
             }
			 else
			 {
				document.getElementById('lname_error').style.display="none";
			 }
			 if(/^[a-zA-Z]+$/.test(lname) == false)
             {  
                 document.getElementById('lname_error').innerHTML="**Please enter a valid last name**";
				 document.getElementById('lname_error').style.display="block";
                 return false;
             }
			 else
			 {
				document.getElementById('lname_error').style.display="none";
			 }


             

             if(phone=="")
             {
                 document.getElementById('phone_error').innerHTML="**Enter your phone number**";
				 document.getElementById('phone_error').style.display="block";
                 return false;
             }
			 else
			{
				document.getElementById('phone_error').style.display="none";
			}
             if(/^[6-9]\d{9}$/.test(phone)==false) 
             {
                 document.getElementById('phone_error').innerHTML="**Enter a valid phone number**";
				 document.getElementById('phone_error').style.display="block";
                 return false;
             }
			 else
			{
				document.getElementById('phone_error').style.display="none";
			}
            
             if(email=="")
             {
                 document.getElementById('email_error').innerHTML="**Enter an email id**";
				 document.getElementById('email_error').style.display="block";
                 return false;
             }
			 else
			 {
				document.getElementById('email_error').style.display="none";
			 }
             if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
             {
                 document.getElementById('email_error').innerHTML="**Enter a valid email id**";
				 document.getElementById('email_error').style.display="block";
                   return false;
             }
			 else
			 {
				document.getElementById('email_error').style.display="none";
			 }
             if(password=="")
             {
                 document.getElementById('password_error').innerHTML="**Password cannot be empty**";
				 document.getElementById('password_error').style.display="block";
                 return false;
             }
			 else
			{
				document.getElementById('password_error').style.display="none";
			}
    
			if(password.length<8 || password.length>16)
			{
				document.getElementById('password_error').innerHTML="**Password should have length between 8 and 16**";
				document.getElementById('password_error').style.display="block";
				return false;
			}
			else
			{
				document.getElementById('password_error').style.display="none";
			}
			if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$/.test(password)==false)
			{
				document.getElementById('password_error').innerHTML="**Password must have minimum 8 and maximum 16 characters, at least one uppercase letter, one lowercase letter, one number and one special character**";
				document.getElementById('password_error').style.display="block";
				return false;
			}
			else
			{
				document.getElementById('password_error').style.display="none";
			}
			if (x === y) 
  { 
    text="";
        document.getElementById('cpassword_error').innerHTML = text;
        return true;
    }
  else 
  {
    text="**Password does not match**";
    document.getElementById('cpassword_error').innerHTML = text;
        return false;
  }
		}
         function onclear()
         {
             document.getElementById('fname_error').innerHTML="";
             document.getElementById('lname_error').innerHTML="";
             document.getElementById('email_error').innerHTML="";
             document.getElementById('phone_error').innerHTML="";
             document.getElementById('password_error').innerHTML="";
             document.getElementById('cpassword_error').innerHTML="";
         }
     </script>
</html>