<?php
include("header.php");
include("config.php");
?>
<!doctype html>
<html>
 <head>
 <meta charset="utf-8">
 
 </head>
 <br>
 <br>
 <br>
 <body>
<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
<form action="" method="post" enctype="multipart/form-data">
   <div class="col-md-9" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px; margin-left: 12%;">
   <div class="container" style="width:65%; margin-left:12% ;box-sizing:border-box; margin-bottom:2%; padding:30px 40px 30px 120px; margin-top: 0%;">
   <div class="row" style="margin-left: -173%;margin-top: 10%;margin-bottom: -5%;">
   
  </div>
   <h2 style="text-align: center;margin-top: 7%;margin-left:10%;font-family: fantasy;">PRODUCT DETAILS</h2>
   <br>
   <div class="row">
    <div class="col-md-3" style="text-align:right">
       <label style="text-align: center;margin-left:-100%">Category</label>
     </div>
    <div class="col-md-6">
       <select class="form-control" name="category_name" id="category_name" style="width:500px;" required autofocus onChange="populate()">
        <option value="0">--Select Category--</option>
        <?php
		  $sql=mysqli_query($con,"SELECT * FROM tbl_category");
		  while($row=mysqli_fetch_array($sql))
		  {
			  ?>
        <option value="<?php echo $row['c_id'] ?>"> <?php echo $row['category'];?> </option>
        <?php
		  }
		  
		?>
      </select>
     </div>
  </div>
   <br>
   <br />
   <br />
   <br />
   <div class="row" style="margin-left:100%;margin-top:-10%;margin-bottom:-5%">
    <div class="col-md-2">
       <input type="submit" name="View" value="View" class="btn btn-primary" >
      </div>
  </div>
 </form>
<?php
if(isset($_POST["View"]))
{
include("config.php");
$category=$_POST["category_name"];
?>
<script>
document.getElementById("category_name").value="<?php echo $category ?>";
</script>
<div class="container" style="width:100%;  margin-left: 350px;" >
   <div class="row">
    <h3 style="text-align: center;;margin-left: 210%;margin-top:10%;padding-bottom
	:5%;margin-right:20%">PRODUCT DETAILS</h3>
    <br>
    <table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:7%;margin-left: -61%">
       <thead>
        <tr>
           <th scope="col">Sl No</th>
           <th>Product</th>
           <th>Image</th>
           <th>Rate </th>
           <th style="color:#090">Stock Update</th>
         </tr>
      </thead>
       <?php
						$slno=1;
$sql=mysqli_query($con,"SELECT * FROM `tbl_product` p inner join tbl_category c on p.si_no=c.c_id inner join tbl_type t on p.type_id=t.type_id where si_no=$category ");
							while($display=mysqli_fetch_array($sql))
							{
								
	echo  "<tr>";
	echo "<td>" .$slno++."</td>";
	echo "<td>".$display["product_name"]."</td>";
	echo "<td><img src='../images/".$display["image"]."'height='150'width='200'/></td>";
	echo "<td>".$display["product_rate"]."</td>";
	echo "<td><a style='color:#090' href='update.php?product_id=".$display['product_id']."'>Update</a> </td>";
								echo "</tr>";
								
							}
						?>
     </table>
  </div>
 </div>
<?php
		}
		?>
</div>
</div>
</div>
</div>
<div></div>
</div>
</div>
</body>
 </html>
<?php
//include("footer.php");
?>
