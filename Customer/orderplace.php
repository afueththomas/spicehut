<?php
include("header.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body onload="myFunction()">
<?php
include("config.php");
?>
<form action="orderaction.php" method="post" enctype="multipart/form-data" style=" padding-top: 8%;background-image:url(images/a9.jpg)">
  <div class="container" style="margin-left:93px; margin-bottom:10%;padding-left:130px; box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px; padding-top: 3%;">
    <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">Shipping Address</h2>
    <br>
    <br>
  <div class="row">
        <div class="col-md-3" style="text-align:right">
          <label>First Name</label>
        </div>
        <div class="col-md-6">
          <input type="tel" class="form-control" name="txt_fname"  pattern="[A-Za-z]{1,32}" style="width:500px;" autocomplete="off" placeholder="First Name" required>
        </div>
      </div>
<br>


<div class="row">
        <div class="col-md-3" style="text-align:right">
          <label>Second Name</label>
        </div>
        <div class="col-md-6">
          <input type="tel" class="form-control" name="txt_lname"  pattern="[A-Za-z]{1,32}" style="width:500px;" autocomplete="off" placeholder="Second Name" required>
        </div>
      </div>
<br>

    <div id="Divaddress">
      <div class="row">
        <div class="col-md-3" style="text-align:right">
          <label>Address</label>
        </div>
        <div class="col-md-6">
          <textarea class="form-control" name="txt_address" style="width:500px;" placeholder="Enter Address" required></textarea>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3" style="text-align:right">
          <label>Contact</label>
        </div>
        <div class="col-md-6">
          <input type="tel" class="form-control" name="txt_contact"  pattern="[0-9]{10}" style="width:500px;" autocomplete="off" placeholder="Contact No. " required>
        </div>
      </div>
    
    <br>
    <div id="Divbutton">
    <div class="row">
      <input type="submit" name="submit" value="Book Now" class="btn btn-primary" style="margin-left:63%">
    </div>
    </div>
    </div>
    <br>
  </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>
