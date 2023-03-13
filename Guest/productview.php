<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<body bgcolor="#DEFCFD">
<?php
include("header.php");
include("config.php");
?>
<form action="" style="padding-top: 7%;">
  <div class="container" style="margin-left:124px; margin-bottom:5%;padding-left:-25px; box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px;padding-top:5%;">
    <h2 style="text-align: center;margin-left: 1%;margin-bottom: -8%;margin-top: -5%;font-family: fantasy;">...PRODUCTS...</h2>
    <br>
    <div class="row" style="min-height: 80%;">
      <?php
	  $c_id=$_GET["c_id"];
      $result=mysqli_query($con,"SELECT * FROM `tbl_product` p inner join tbl_quantity q on p.quantity_id=q.quantity_id  where si_no	='$c_id'");
  
     while($row=mysqli_fetch_array($result))
							{
								?>
      <div class="col-md-4" style="box-shadow: 3px 3px 10px #000; border-radius: 10px; top: 34px;width: 260px;height:470px;background-color: white;color: white;margin-left:7%;;margin-top:8%;margin-bottom:15%;margin-right:6px%;"> 
      <?php echo "<a style='color:#090' href='customerreg.php'>";?>
    

      <?php
      if ($row['stock']==NULL)
      echo "NO STOCKS AVAILABLE";
      else
       {
        echo "Only ";
       echo $row['stock'];
       echo " Stock Left!!!";
       }
       ?>

        <div style="text-align: center;margin-top:43px;"><b> </b></div>
        <div style="text-align: center"> <b> <img src="../images/<?php echo $row['image'] ?>" width="250px" height="200px"/>
       
          <p style="color:black">Product Name:</p>
          <p style="color:green">
            <?php  echo $row['product_name']?>
           

            <p style="color:black">Quantity:</p>
          <p style="color:green">
          <?php  echo $row['quantity']?>

          <p style="color:black">Rate:</p>
          <p style="color:green">
            <?php  
            echo "₹";
            echo $row['product_rate']?>
            <br />
            <input type="button" name="booknow" value="Book Your Product" class="btn btn-danger" />
          </b> </div>
      </div>
      <?php "</a>"; ?>
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
