<?php
include("header.php");
?>
<!doctype html>
<html>

<body>
<?php
include("config.php");
?>
<form action="adminloginaction.php" method="post" enctype="multipart/form-data">
<div class="container" style="width:100%;margin-left:20%;margin-bottom: 14%;padding-top:8%" >
    <div class="row">
      <div class="col-md-9" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px;">
        <h2 style="text-align: center;font-family: fantasy;">ADMIN LOGIN</h2>

    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Username</label>
      </div>
      <div class="col-md-6">
        <input type="text"  class="form-control" name="txt_name" style="width:500px;" placeholder="Enter User Name" autocomplete="off">
      </div>
    </div>
    <br>
    
    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Password</label>
      </div>
      <div class="col-md-6">
        <input type="password"  class="form-control"  name="txt_password" placeholder="Password" style="width:500px;" autocomplete="off">
      </div>
    </div>
    <br>
   
     <div class="row">
      <input type="submit" name="btnsubmit" value="Login" class="btn btn-primary" style="margin-left:63%">
    </div>
    <br>
     </div>
</div>
</div>
</form>
</body>
</html>
