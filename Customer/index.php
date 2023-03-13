<?php
include("header.php");
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="main-top" id="home">

    <div class="slider-img ">
      <div class="container">
        <div class="slider-info">
        
        <div style="background: rgb(249 250 251 / 75%);">
        <h5>We Sell</h5>
          <h4> The Best Organic Spices</h4>
          <p>We Sell The Best Spices Directly From The Faramers, We are collecting Spices Through Our Collection Center After Testing, So That You Can Buy 100% Genuine Products</p>
        </div>
        </div>
        <div class="outs_more-buttn mt-md-4 mt-3">
          <a href="#Products">View Spices</a>
        </div>
      </div>
    </div>
  </div>
</body>
<form id="Products" style="padding-top: 7%;">
  <div class="container" >
    <h2 style="text-align: center;margin-left: 1%;margin-bottom: -8%;margin-top: -5%;font-family: fantasy;">PRODUCTS</h2>
    <br>
    <div class="row" style="min-height: 80%;">
      <?php
      $result=mysqli_query($con,"SELECT * FROM `tbl_product` p inner join tbl_quantity q on p.quantity_id=q.quantity_id");
  
     while($row=mysqli_fetch_array($result))
							{
								?>
      <div class="col-md-4" style="box-shadow: 3px 3px 10px #000; border-radius: 10px; top: 34px;width: 260px;height:439px;background-color: white;color: white;margin-left:7%;;margin-top:8%;margin-bottom:15%;margin-right:6px%;">
       <?php echo "<a style='color:#090' href='Productviewmore.php?p_id=".$row['product_id']."'>";?>
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
            <input type="button" name="booknow" value="Add To Cart" class="btn btn-danger" />
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
<?php
include("footer.php");
?>

</html>