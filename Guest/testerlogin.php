<?php
include("header.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
include("config.php");
?>
<form action="testerloginaction.php" method="post" >
  <div class="container" style="width:100%;margin-left:20%;margin-bottom: 14%;padding-top:8%" >
    <div class="row">
      <div class="col-md-9" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px;">
        <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;"><u>TESTER LOGIN</u></h2>
        <br />
        <div class="row">
          <div class="col-md-3" style="text-align:right">
            <label>Username</label>
          </div>
          <div class="col-md-6">
            <input type="email" class="form-control" name="txt_name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="width:500px;" autocomplete="off">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-3" style="text-align:right">
            <label>Password</label>
          </div>
          <div class="col-md-6">
            <input type="password" class="form-control" name="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="width:500px;"  required  >
          </div>
        </div>
        <br>
        <div class="row">
          <input type="submit" name="submit" value="Login" class="btn btn-primary" style="margin-left:63%">
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</form>
</body>
</html>


