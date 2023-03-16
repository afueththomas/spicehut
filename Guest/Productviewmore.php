<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body >
<?php
include("header.php");
include("config.php");
$pid=$_GET["pid"];
$result=mysqli_query($con,"SELECT * from tbl_product p inner join tbl_category c on p.si_no=c_id inner join tbl_type t on p.type_id=t.type_id inner join tbl_quantity q on p.quantity_id=q.quantity_id  where p.product_id='$pid'");
$row=mysqli_fetch_array($result);
?>
<br>
<br>

<form action="customerlogin.php" style="padding-top: 7%;background-image:url(images/a9.jpg)" method="post">
  <div class="container" style="margin-left:200px; margin-bottom:5%;padding-left:-25px; box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px;padding-top:5%;background-image:url(images/account-bg.jpg);background-color:white">
    <h2 style="text-align: center;margin-left: 1%;margin-bottom: -8%;margin-top: -5%;font-family: fantasy;"><?php echo $row['product_name'] ?></h2>
    <br>
    <div class="row">
      <div class="col-md-9" style="margin-top: 15%;
    margin-left: 6%;"> <img src="../images/<?php echo $row['image'] ?>" width="400px" style="box-shadow: 2px 2px 10px #000000; border-radius:  44%;"/> </div>
      <div class="col-md-6" style="margin-top: -26%;
    margin-left: 45%;">
        <input type="hidden" value="<?php echo $row['product_id']?>" name="hiddenpid" />
        <br>
        <p style="color:black;font-size: larger;">Product Name:</p>
        <p style="color:green"><b>
          <?php  echo $row['product_name']?>
          </b> </p>
          <p style="color:black;font-size: larger;">Type:</p>
        <p style="color:green"><b>
          <?php  echo $row['type']?>
          </b> </p>

          <p style="color:black;font-size: larger;">Quantity:</p>
        <p style="color:green"><b>
          <?php  echo $row['quantity']?>
          </b> </p>
      
        <p style="color:black;font-size: larger;">Price in :</p>

        <p style="color:green"><b>
          <?php 
          echo "₹";
          echo  $row['product_rate']?>
           <input type="hidden" value=" <?php echo $row['product_rate']?>"  name="txtprice" id="txtprice" class="form-control" />

          </b> </p>
        <br />
        <input type="submit" name="booknow" value="Add To Cart" class="btn btn-danger" />

      </div>
    </div>

    <br />
  </div>
  </div>
</form>

</body>
</html>
 <?php
// include("footer.php");
?>

