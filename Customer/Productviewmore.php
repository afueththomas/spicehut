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

<form action="booknowaction.php" style="padding-top: 7%;background-image:url(images/a9.jpg)" method="post">
  <div class="container" style="margin-left:124px; margin-bottom:5%;padding-left:-25px; box-shadow: 2px 2px 10px #000000; border-radius: 4px; top: 14px;padding-top:5%;background-image:url(images/account-bg.jpg);background-color:white">
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
            <input type="hidden" value="<?php echo $row['product_id']; ?>" name="pid" id="pid">
          </b> </p>
       
<!-- <script>

		function funcation1(){	
			
		var qty=document.getElementById("txtqty").value;
		var price=document.getElementById("txtprice").value;
		var total=qty*price;
		document.getElementById("totamt").value=total;
		}
		</script> -->
        <br />
        <input type="submit" name="booknow" value="Add To Cart" class="btn btn-success" />

      </div>
    </div>
    <br />

  </div>
  </div>
  </html>





  <!DOCTYPE html>
<html>
<head>
  <title>Product Reviews</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .review-container {
      border: 1px solid #ddd;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
      width: 70%;
    }
    .review-table {
      margin-top: 20px;
      width: 100%;
      border-collapse: collapse;
    }
    .review-table th, .review-table td {
      padding: 10px;
      border: 1px solid #ddd;
    }
  
  </style>
</head>
<body>
  <div class="center">
    <div class="review-container">


  <?php
$query_review = "SELECT * FROM review_table WHERE product_id='$pid'";
$result_review = mysqli_query($con, $query_review);
if ($result_review) {
  if (mysqli_num_rows($result_review) > 0) {
    ?>
    <style>
      .bar-container {
        display: inline-block;
        width: 80px;
        height: 12px;
        background-color: #ddd;
        border-radius: 3px;
        overflow: hidden;
      }
      .bar {
        display: inline-block;
        height: 100%;
        background-color: #4caf50;
      }
      .rating {
        display: inline-block;
        margin-left: 5px;
        font-size: 10px;
        color: #555;
      }
      .fa {
        font-size: 16px;
        color: #ffc107;
      }
      .fa-star-o {
        color: #ccc;
      }
    </style>
    <table class="review-table">
      <thead>
        <tr>
          <th>Username</th>
          <th>Review</th>
          <th>Star Rating</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($r = mysqli_fetch_array($result_review)) {
          ?>
          <tr>
            <td><?php echo $r['user_name']; ?></td>
            <td><?php echo $r['user_review']; ?></td>
            <td>
              <?php 
                // display star rating
                for ($i=0; $i<$r['user_rating']; $i++) {
                  echo '<i class="fa fa-star"></i>';
                }
                for ($i=$r['user_rating']; $i<5; $i++) {
                  echo '<i class="fa fa-star-o"></i>';
                }
              ?>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
  } else {
    ?>
    <p>No Reviews Yet</p>
    <?php
  }
} else {
  echo "Query error";
}



?>


<div style="text-align: center;">
  <?php 
    // make database connection
    $conn = mysqli_connect("localhost", "root", "", "db_spicehut");

    // check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // query database for reviews
    $sql = "SELECT user_rating FROM review_table";
    $result = mysqli_query($conn, $sql);

    // calculate average rating
    $total_rating = 0;
    $num_reviews = mysqli_num_rows($result);
    while ($row = mysqli_fetch_assoc($result)) {
      $total_rating += $row['user_rating'];
    }
    $avg_rating = round($total_rating / $num_reviews, 1);
    
    // calculate bar width
    $rating_percent = ($avg_rating / 5) * 100;

    // close database connection
    mysqli_close($conn);
  ?>

  <div class="rating-title" style="font-size: 36px; font-weight: bold;">Average Rating</div>
  <div class="rating-value" style="font-size: 24px; font-weight: bold; margin-top: 20px;"><?php echo $avg_rating; ?></div>
  <div class="bar-container" style="width: 50%; margin: 50px auto;">
    <div class="bar" style="width: <?php echo $rating_percent; ?>%;"></div>
  </div>
</div>

<style>
  .bar-container {
    background-color: #ddd;
    height: 30px;
    border-radius: 5px;
    overflow: hidden;
  }
  
  .bar {
    background-color: #4CAF50;
    height: 100%;
    transition: width 0.5s ease-in-out;
  }

  .rating-title {
    margin-top: 50px;
  }
</style>


</div>
  </div>
  </div>
</body>
</html>




 <?php
// include("footer.php");
?>

