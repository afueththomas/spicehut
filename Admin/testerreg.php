<?php

include("config.php");

if (isset($_POST['addmem_submit']))
{
 
  $firstname = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $house_name = $_POST['hname'];
  $gender = $_POST['gender'];
  $place = $_POST['palce'];
  $pincode = $_POST['pincode'];
  $aadharno = $_POST['aadhar'];
  $password = $_POST['psw'];
  $pwd = md5($password);
  $birthdate = $_POST['dob'];

$reg_query=mysqli_query($con,"INSERT INTO `tbl_tester`(`fname`, `lname`, `email`, `phone`, `dob`, `gender`, `house_name`, `place`, `pincode`, `aadhar`, `password`) VALUES ('$firstname','$lastName','$email','$contact','$birthdate','$gender','$house_name','$place','$pincode','$aadharno','$pwd')");


 if($reg_query)
 {
 echo "<script> alert ('Thank you for registration !!! '); window.location='#'</script>";

 require "../Mail/phpmailer/PHPMailerAutoload.php";
 $mail = new PHPMailer;

 $mail->isSMTP();
 $mail->Host = 'smtp.gmail.com';
 $mail->Port = 587;
 $mail->SMTPAuth = true;
 $mail->SMTPSecure = 'tls';

 // h-hotel account
 $mail->Username = 'afueththomas2023b@mca.ajce.in';
 $mail->Password = '########';

 // send by h-hotel email
 $mail->setFrom('afueththomas2023b@mca.ajce.in', 'Employee added');
 // get email from input
 $mail->addAddress($_POST["email"]);
 //$mail->addReplyTo('lamkaizhe16@gmail.com');

 // HTML body
 $mail->isHTML(true);
 $mail->Subject = "You are added as an SpiceHut Employee ";
 $mail->Body = "<b>Dear $firstname $lastName</b>
       <h3>You are appointed as a Employee of SpiceHut</h3>
      Now you can join simlply using username= $email and passsword=$password
       <br><br>
       <p>With regrads,</p>
       <b>Admin , SpiceHut</b>";

 if (!$mail->send()) {
    
   echo "<script> alert ('Email Send UnSuccessfull !!! '); window.location='#'</script>";

 } 
 else {

  
   echo "<script> alert ('Email Send Successfully !!! '); window.location='index.php'</script>";
 }
}







 
 }
 
 
else {
echo "<script Type='text/javascript'>alert('Your Tester registration  was unsuccessfull please try again')</script>";
}





















   ?>




<html>

<head>
  <meta charset="UTF-8">
  <!-- <title> Responsive Registration Form | Fantacy Design </title>
    <link rel="stylesheet" href="style.css"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  /* Import Google font - Poppins */
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    min-height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgb(230, 230, 250);
  }

  .container {
    position: relative;
    max-width: 700px;
    width: 100%;
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  }

  .container header {
    font-size: 1.5rem;
    color: #333;
    font-weight: 500;
    text-align: center;
  }

  .container .form {
    margin-top: 30px;
  }

  .form .input-box {
    width: 100%;
    margin-top: 20px;
  }

  .input-box label {
    color: #333;
  }

  .form :where(.input-box input, .select-box) {
    position: relative;
    height: 50px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: #707070;
    margin-top: 8px;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 0 15px;
  }

  .input-box input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
  }

  .form .column {
    display: flex;
    column-gap: 15px;
  }

  .form .gender-box {
    margin-top: 20px;
  }

  .gender-box h3 {
    color: #333;
    font-size: 1rem;
    font-weight: 400;
    margin-bottom: 8px;
  }

  .form :where(.gender-option, .gender) {
    display: flex;
    align-items: center;
    column-gap: 50px;
    flex-wrap: wrap;
  }

  .form .gender {
    column-gap: 5px;
  }

  .gender input {
    accent-color: rgb(130, 106, 251);
  }

  .form :where(.gender input, .gender label) {
    cursor: pointer;
  }

  .gender label {
    color: #707070;
  }

  .address :where(input, .select-box) {
    margin-top: 15px;
  }

  .select-box select {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    color: #707070;
    font-size: 1rem;
  }

  .form button {
    height: 55px;
    width: 100%;
    color: #fff;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 30px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease;
    background: rgb(130, 106, 251);
  }

  .form button:hover {
    background: rgb(88, 56, 250);
  }

  /*Responsive*/
  @media screen and (max-width: 500px) {
    .form .column {
      flex-wrap: wrap;
    }

    .form :where(.gender-option, .gender) {
      row-gap: 15px;
    }
  }
</style>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <!--<title>Registration Form in HTML CSS</title>-->
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section class="container">
    <header>TESTER REGISTRATION</header>
    <form action="#" class="form" enctype="multipart/form-data" method="POST">
      <div class="input-box">
        <label>First Name</label>
        <input type="text" placeholder="Enter Your First Name" name="firstName" onkeyup='fnameValidation(this)' id="fname" required="required" />
        <span id="name" class="new" style="color:red;"></span>
      </div>


      <div class="input-box">
        <label>Last Name</label>
        <input type="text" placeholder="Enter Your Last Name" name="lastName" id="laname" onkeyup='lnameValidation(this)' required="required" />
        <span id="lname" class="new"></span>
      </div>

      <div class="input-box">
        <label>Email Address</label>
        <input type="email" name="email" onkeyup='emailValidation(this)' placeholder="Enter email address" id="eid" required />
        <span id="mail" class="new"></span>
      </div>

      <div class="column">
        <div class="input-box">
          <label>Phone Number</label>
          <input type="text" onkeyup='contactValidation(this)' name="contact" required="required" placeholder="Enter phone number" required />
          <span id="phno" class="new"></span>
        </div>
        <div class="input-box">
          <label>Birth Date</label>
          <input type="date" min="1960-01-01" max="2004-12-31" name="dob" placeholder="Enter birth date" required />
          <span id="data" class="new"></span>
        </div>
      </div>
      <div class="gender-box">
        <h3>Gender</h3>
        <div class="gender-option">
          <div class="gender">
            <input type="radio" id="check-male" name="gender" value="Male" checked />
            <label for="check-male">male</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-female" value="Female" name="gender" />
            <label for="check-female">Female</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-other" value="prefer not to say" name="gender" />
            <label for="check-other">prefer not to say</label>
          </div>
        </div>
      </div>
      <div class="input-box address">
        <label>Address</label>
        <input type="text" type="text" placeholder="Enter house name" name="hname" onkeyup='housenameValidation(this)' placeholder="Enter house name" required />
        <span id="hname" class="new"></span>
        <input type="text" placeholder="Enter place" name="palce" onkeyup='placeValidation(this)' required />
        <span id="place" class="new"></span>

        <div class="input-box">

          <input type="text" placeholder="Enter  Pin Code" name="pincode" onkeyup='pinValidation(this)' required />
          <span id="pinc" class="new"></span>
        </div>
      </div>

      <div class="input-box">
        <!-- <label>Middle Name</label> -->
        <input type="text" placeholder="Enter  Aadhaar Number" name="aadhar" onkeyup='aadhaarValidation(this)' required />
        <span id="aadhar" class="new"></span>
      </div>

      </div>

      <div class="input-box">

        <input type="text" placeholder="password" onkeyup='passwordValidation(this)' name="psw" required />
        <span id="pass1" class="new"></span>
      </div>
      </div>
      <button name="addmem_submit">Submit</button>
    </form>
  </section>
</body>

</html>
<script src="assets\js\addstaffscp.js"></script>
<script>
  $('#date').val(new Date().toJSON().slice(0, 10));

  function fnameValidation(inputTxt) {

    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("name");

    if (inputTxt.value != '') {

      if (inputTxt.value.length >= 2) {

        if (inputTxt.value.match(regx)) {
          textField.textContent = '';
          textField.style.color = "green";

        } else {
          textField.textContent = 'only characters are allowded to insert!';
          textField.style.color = "red";
        }
      } else {
        textField.textContent = 'your input must more than two chracters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function mnameValidation(inputTxt) {

    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("mname");

    if (inputTxt.value != '') {

      if (inputTxt.value.length >= 1) {

        if (inputTxt.value.match(regx)) {
          textField.textContent = '';
          textField.style.color = "green";

        } else {
          textField.textContent = 'only characters are allowded to insert!';
          textField.style.color = "red";
        }
      } else {
        textField.textContent = 'your input must me more than two chracters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function lnameValidation(inputTxt) {

    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("lname");

    if (inputTxt.value != '') {

      if (inputTxt.value.length >= 2) {

        if (inputTxt.value.match(regx)) {
          textField.textContent = '';
          textField.style.color = "green";

        } else {
          textField.textContent = 'only characters are allowded to insert!';
          textField.style.color = "red";
        }
      } else {
        textField.textContent = 'your input must me more than two chracters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function emailValidation(inputTxt) {
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    var textField = document.getElementById("mail");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(regx)) {
        textField.textContent = '';
        textField.style.color = "green";
      } else {
        textField.textContent = 'email id  is not valid!!! please insert a valid one';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function contactValidation(inputTxt) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var textField = document.getElementById("phno");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(phoneno)) {
        textField.textContent = '';
        textField.style.color = "green";
      } else {
        textField.textContent = 'phone no  is not valid!!! please insert a valid one';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function housenameValidation(inputTxt) {

    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("hname");

    if (inputTxt.value != '') {

      if (inputTxt.value.length >= 2) {

        if (inputTxt.value.match(regx)) {
          textField.textContent = '';
          textField.style.color = "green";

        } else {
          textField.textContent = 'only characters are allowded to insert!';
          textField.style.color = "red";
        }
      } else {
        textField.textContent = 'your input must me more than two chracters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function placeValidation(inputTxt) {

    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("place");

    if (inputTxt.value != '') {

      if (inputTxt.value.length >= 2) {

        if (inputTxt.value.match(regx)) {
          textField.textContent = '';
          textField.style.color = "green";

        } else {
          textField.textContent = 'only characters are allowded to insert!';
          textField.style.color = "red";
        }
      } else {
        textField.textContent = 'your input must me more than two chracters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function pofficeValidation(inputTxt) {

    var regx = /^[a-zA-Z]+$/;
    var textField = document.getElementById("poffice");

    if (inputTxt.value != '') {

      if (inputTxt.value.length >= 2) {

        if (inputTxt.value.match(regx)) {
          textField.textContent = '';
          textField.style.color = "green";

        } else {
          textField.textContent = 'only numbers are allowded to insert!';
          textField.style.color = "red";
        }
      } else {
        textField.textContent = 'your input must me more than two chracters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function aadhaarValidation(inputTxt) {

    var regx = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
    var textField = document.getElementById("aadhar");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(regx)) {
        textField.textContent = '';
        textField.style.color = "green";
      } else {
        textField.textContent = 'Your aadhar number  is not valid!!! please insert a valid one';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function passwordValidation(inputTxt) {

    var regx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/;
    var textField = document.getElementById("pass1");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(regx)) {
        textField.textContent = '';
        textField.style.color = "green";

      } else {
        textField.textContent = 'Must contain at least one number and one uppercase and lowercase letter and aleast 5 characters';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function salaryValidation(inputTxt) {

    var regx = /^\d{1,6}(?:\.\d{0,2})?$/;
    var textField = document.getElementById("sal");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(regx)) {
        textField.textContent = '';
        textField.style.color = "green";

      } else {
        textField.textContent = 'please enter only valid  input!!!';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  function pinValidation(inputTxt) {
    // ^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$
    var regx = /[1-9][0-9]{5}$/;
    var textField = document.getElementById("pinc");

    if (inputTxt.value != '') {
      if (inputTxt.value.match(regx)) {
        textField.textContent = '';
        textField.style.color = "green";
      } else {
        textField.textContent = 'your are trying to enter wrong input values';
        textField.style.color = "red";
      }
    } else {
      textField.textContent = 'your are not allowed  to leave a field  empty';
      textField.style.color = "red";
    }
  }

  var a = ["31-12-2004"];
  var b = ["31-12-2009"];
  var c = ["31-12-2014"];
  var d = ["31-12-2019"];
  var e = ["31-12-2024"];
  var f = ["31-12-2029"];
  var g = ["31-12-2034"];
  var h = ["31-12-2039"];
  var i = ["31-12-2044"];
  var j = ["31-12-2049"];
  var k = ["31-12-2054"];



  $("#inputState").change(function() {
    var StateSelected = $(this).val();
    var optionsList;
    var htmlString = "";

    switch (StateSelected) {
      case "01-01-2000":
        optionsList = a;
        break;
      case "01-01-2005":
        optionsList = b;
        break;
      case "01-01-2010":
        optionsList = c;
        break;
      case "01-01-2015":
        optionsList = d;
        break;
      case "01-01-2020":
        optionsList = e;
        break;
      case "01-01-2025":
        optionsList = f;
        break;
      case "01-01-2030":
        optionsList = g;
        break;
      case "01-01-2035":
        optionsList = h;
        break;
      case "01-01-2040":
        optionsList = i;
        break;
      case "01-01-2045":
        optionsList = j;
        break;
      case "01-01-2050":
        optionsList = k;
        break;
    }


    for (var i = 0; i < optionsList.length; i++) {
      htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
    }
    $("#inputDistrict").html(htmlString);

  });
</script>
