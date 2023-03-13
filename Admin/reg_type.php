<?php
include("header.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
include("config.php");
?>
<form action="typeaddition.php" method="post" enctype="multipart/form-data" style=" padding-top: 8%;">
<div class="container">
        <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">TYPE REGISTRATION</h2>

    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Type  </label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_Type" pattern="^[A-Za_z][A-Za-z -]+$" style="width:500px;" placeholder="Enter type " autocomplete="off">
      </div>
    </div>
    <br>
    <div class="row">
     <div class="col-md-3" style="text-align:right">
        <label>Description</label>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="txt_Description" pattern="^[A-Za_z][A-Za-z -]+$" style="width:500px;" placeholder="Enter Description" autocomplete="off">
      </div>
    </div>
    <br>
     <div class="row">
      <input type="submit" name="submit" value="Save" class="btn btn-primary" style="margin-left:63%">
    </div>
    <br>
     </div>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
<?php
include("footer.php");
?>