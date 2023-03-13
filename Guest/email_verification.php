<?php
session_start();
include('header.php');
include('config.php');
if(isset($_POST['recieve_otp']))
{
    $otp=$_POST['otp'];
    $recipient=$_SESSION['email'];
    $select_otp=mysqli_query($con,"SELECT otp FROM tbl_customer WHERE email='$recipient'");
    if($select_otp)
    {
        if(mysqli_num_rows($select_otp))
        {
            $real_otp=mysqli_fetch_array($select_otp)['otp'];
            if($otp==$real_otp)
            {
                echo "<script> alert('Account activated Successfully...'); window.location.href='login.php'; </script>";
            }
            else
            {
                echo "<script> alert('Entered OTP is incorrect, Registration failed!!'); </script>";
                if($category=='user')
                $sql="DELETE FROM login_tb JOIN user_tb ON login_tb.login_id=user_tb.user_id WHERE login_tb.login_id='$login_id'";
                if($category=='labour')
                $sql="DELETE FROM login_tb JOIN labour_tb ON login_tb.login_id=labour_tb.labour_id WHERE login_tb.login_id='$login_id'";
                if($category=='contractor')
                $sql="DELETE FROM login_tb JOIN contractor_tb ON login_tb.login_id=contractor_tb.contractor_id WHERE login_tb.login_id='$login_id'";
                if($category=='sub_contractor')
                $sql="DELETE FROM login_tb JOIN labour_tb ON login_tb.login_id=sub_contractor_tb.sub_contractor_id WHERE login_tb.login_id='$login_id'";
                $res_delete=mysqli_query($con,$sql);
                if(!$res_delete)
                    echo "<script> alert('delete query error!); </script>";
            }
        }

    }
}
session_destroy();
?>
<div class="content">
  <div class="content-heading">Please submit the OTP for account activation</div>
  <form method="post" action='#' onsubmit="return validate()" autocomplete="off">
    <div>
    <label>Enter the 6-digit OTP sent to your email </label>
    <input type="text" name="otp" id="otp" maxlength="6" onclick="return validate()" onblur="return validate()" onkeyup="return validate()"><br><br>
    </div>
    <div>
    <span id="otp_error"></span>
    </div>
    <div>
    <input type="submit" value="Proceed" name="recieve_otp" id="submit">
    </div>
</form>
</div>
</div>
<style>
    span{
  color:red;
  font-size:15pt;
  font-weight:bolder;
}
.content{
  margin-left:90px;
  margin-top:100px;
  margin-bottom:100px;
  background:white;
  width:fit-content;
  height:fit-content;
  box-shadow:5px 2px 4px 9px;
  padding:80px 120px;
  font-size:18pt;
}
.content-heading{
  color:green;
  font-size:14pt;
  font-weight:bold;
}
.content label{
  color:color;
  font-size:16pt;
  font-weight:bold;
  font-style:italic;
}
input{
  padding:10px 30px;
}
#submit{
  background-color:darkblue;
  color:white;
}
</style>

<script>
function validate() 
{
        var otp = document.getElementById('otp').value.trim();
        
        if (otp=="") 
        {
            document.getElementById('otp_error').style.display = "block";
            document.getElementById('otp_error').innerHTML = "**Please enter the OTP**";
            return false;
        } 
        if(isNaN(otp)==true)
        {
            document.getElementById('otp_error').style.display = "block";
            document.getElementById('otp_error').innerHTML = "**Please enter only digits**";
            return false;
        }
        else 
        {
            document.getElementById('otp_error').style.display = "none";
            return true;
        }
}

    if ( window.history.replaceState ) {                                        //prevent resubmission on refresh
        window.history.replaceState( null, null, window.location.href );
    }
</script>