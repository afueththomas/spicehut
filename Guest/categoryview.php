<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body >
<body bgcolor="#DEFCFD">
<?php
include("header.php");
include("config.php");
?>
<form action="view_subcategory.php" style="    padding-top: 7%;background-image:url(images/a9.jpg)">
  <div class="container" style="margin-left:124px; margin-bottom:5%;padding-left:-25px; box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px;padding-top:5%;">
    <h2 style="text-align: center;margin-left: 1%;margin-bottom: -4;margin-top: -2%;font-family: fantasy;">CHOOSE YOUR CATEGORY</h2>
    <br>
    <div class="row" style="min-height: 50%;">
      <?php
      $result=mysqli_query($con,"SELECT * FROM tbl_category");
     while($row=mysqli_fetch_array($result))
							{
								?>
      <div class="col-md-2" style="box-shadow: 3px 3px 10px #000; border-radius: 10px; top: -34px;width: 260px;height: 120px;background-color: #ecf0f3;color: #ecf0f3;margin-left:7%;;margin-top:8%;margin-bottom:15%;margin-right:6px%;">
        <div style="text-align: center;margin-top:43px;"><b> </b></div>
        <div style="text-align: center"> <b> <?php echo "<a style='color:#090' href='productview.php?c_id=".$row['c_id']."'>";?>
          <?php  echo $row['category']?>
          <?php "</a>"; ?>
          </b> </div>
      </div>
      <?php
							}
                              ?>
    </div>
  </div>
  </div>
</form>
</body>
</html>

</body>
</html>