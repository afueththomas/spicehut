<?php
session_start();
include('header.php');
include('config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['send_otp']))
    {
        $recipient=$_POST['email'];
        $checkemail="SELECT *FROM tbl_customer WHERE email='$recipient'";
        $checker=mysqli_query($con,$checkemail);
        if($checker)
        {
            if(mysqli_num_rows($checker)>0)
            {
                $code=rand(999999,111111);
                $insert_otp="UPDATE tbl_customer SET otp='$code' WHERE email='$recipient'";
                $otp_sender=mysqli_query($con,$insert_otp);
                $_SESSION['email']=$recipient;
             if($otp_sender)
             {                         //Enable verbose debug output
                // $mail = new PHPMailer; //From email address and name
                // $mail->SMTPDebug = 2; 
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'afueththomas2023b@mca.ajce.in';                     //SMTP username
                $mail->Password   = '########';                               //SMTP password
                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                $mail->Port       = 465;   
                $mail->setFrom('afueththomas2023b@mca.ajce.in');
                $mail->addAddress($recipient, 'Portal User');  
                // $mail->FromName = "Labour Management Portal"; //To address and name 
                // $mail->addAddress($recipient);//Recipient name is optional
                $mail->isHTML(true); 
                $mail->Subject = "Reset Password-LMS"; 
                $mail->Body = "Please use this code ". $code." to reset your password for account in labour management system ";
                $mail->AltBody = "This is the plain text version of the email content"; 
                if(!$mail->send()) 
                {
                echo "Mailer Error: " . $mail->ErrorInfo; 
                } 
                else 
                { 
                    echo "<script> alert('Message has been sent successfully'); </script>"; 
                }
            } 
        }
        else
        echo "<script> alert('Email ID is not yet registered'); </script>";
    }
}
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
                echo "<script> alert('Email Verification done...'); window.location.href='reset_password.php'; </script>";
            }
            else
            echo "<script> alert('Entered OTP is incorrect'); </script>";

        }
    }
}

?>
<br>
<br>
<style>
        .email-input{
        margin-left:350px;
        margin-top:25px;
        height:50px;
        }
        .otp-input{
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
            background-color:Whitesmoke;
        }
        input{
        height:35px;
        width:300px;
        padding-left:40px;
        }
        .error_class{
        color:red;
        font-weight:bolder;
        }
        .container{
            font-weight:bolder;
            font-size:14pt;
            margin-top:10px;
            margin-bottom:30px;
        }
    </style>



        <div class="container">
        <script>
                function validate()
                {
                    var email_id,pass_word;
                    var email_pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
                    var password_pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$";  /* Minimum 8 and maximum 16 characters, at least one uppercase letter, one lowercase letter, one number and one special character*/
                    email_id=document.getElementById('email').value.trim();
                    // pass_word=document.getElementById('password').value.trim();

                    if(email_id=="") 
                    {
                    document.getElementById('email_error').innerHTML="**email id  cannot be empty**";
                    document.getElementById('email_error').style.display="block";
                    return false;
                    } 
                    else
                    {
                        document.getElementById('email_error').style.display="none";
                    }
                    if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email_id)))
                    {
                    document.getElementById('email_error').innerHTML="**Invalid Email ID, example: yourname@gmail.com**";
                    document.getElementById('email_error').style.display="block";
                    return false;
                    }   
                    else
                    {
                    document.getElementById('email_error').style.display="none";
                    return true;
                    }
                }
       

                function validate_otp(){
                    var otp=document.getElementById('otp').value.trim();

                    if(otp==""){
                        document.getElementById('otp_error').style.display="block";
                        document.getElementById('otp_error').innerHTML="**Please Enter Otp**";
                        return false;
                    }
                    if(/^\d{6}$/.test(otp)==false) {
                        document.getElementById('otp_error').style.display="block"; 
                        document.getElementById('otp_error').innerHTML="**Otp must be a number";
                        return false;
                    }
                    else{
                    document.getElementById('otp_error').style.display="none";
                    return true;
                    }
                 }



        </script>
            <form method="post" action=" " onsubmit="return validate()" autocomplete="off">
            <div class="email-input">
                <label>Enter your email</label>
            </div>
            <div class="input-class">
                <input type="text" name="email" id="email" onblur="return validate()" onkeyup="return validate()" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>">
            </div>
            <div class="input-class">
            <span id="email_error" style="color:red;" name="email_error"></span>
            </div>
            <div class="input-class">
                <input type="submit" name="send_otp" onclick="return validate()" value="Send OTP" style="background-color:#333;color:whitesmoke;height:25px; width:fit-content; padding-right:30px;margin-top:4px;">
            </div>
                </form>
            <form method="post" action=" " onsubmit="return validate() && validate_otp()" autocomplete="off">
            <div class="otp-input">
                <label style="color:white;">Enter the One-Time Password sent to your email</label>
            </div>
            <div class="input-class">
                <input type="text" name="otp" onblur="return validate_otp()" onkeyup="return validate_otp()"  id="otp" placeholder="XXXXXX" >
            </div>
            <div class="input-class">
            <span id="otp_error" style="color:red;" name="otp_error"></span>
            </div>
            <div class="input-class">
                <input type="submit" name="recieve_otp"  value="submit" style="background-color:lightyellow;color:black;height:30px;border:none; box-shadow:2px 2px 3px 4px; width:fit-content; padding-right:30px;">
            </div>
        </form>
    </div>
<?php 
// include('footer.php');
?>
