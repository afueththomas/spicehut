<?php
include("header.php");

?>
<!DOCTYPE html>
<html>
    <head>
    <title>Untitled Document</title>
    </head>
   <body style="background-image:url(../Guest/images/account-bg.jpg)">

<form action="" method="POST">
      <div class="container" style="width:100%;margin-bottom: 15%;padding-top:0%" >
      <div class="col-md-9" style="box-shadow: 2px 2px 10px #1b93e1; border-radius:0px; top: 14px; margin-left:150px;background-color:white">
      </div>
      <h2 style="text-align: center;margin-top: 10%;font-family: fantasy;padding-top:2%">BOOKING REPORT</h2>
      <br>
      <?php
	  include("config.php");
	  ?>
     
  <br>


  <div style="padding-bottom:4%">
      <table class="table table-hover" style="border: 2px solid #adaaaa;margin-left: box-shadow: 3px 3px 11px #777777; padding-bottom:7%;background-color:white">
      
    <th> No.</th>
    <th>Category</th>
    <th>No. Of Bookings</th>
   
  

    <?php


$sql=mysqli_query($con,"select category,count(*) as count from tbl_bookingmaster bm inner join tbl_bookingdetail bd on bm.booking_id = bd.booking_id inner join tbl_product p on p.product_id = bd.product_id inner join tbl_category ca on ca.c_id = p.si_no inner join tbl_type t on t.type_id=p.type_id group by p.si_no");

$s=1;

//echo "SELECT * FROM `tbl_bookingmaster` bm inner join tbl_cregistration c on bm.customer_id=c.cus_id WHERE bm.booking_date >='$fromdate' and bm.booking_date <='$todate'  group by bm.booking_id";
   while($display=mysqli_fetch_array($sql))
	{
	echo "<tr>";
	echo"<td>".$s++."</td>";
	echo "<td>".$display["category"]."</td>";
	echo "<td>".$display["count"]."</td>";
	
	
	
	echo "</tr>";
	}
 
echo "</table>";;
	
?>
      </table>
      <table class="table table-hover" style="border: 2px solid #adaaaa;margin-left: box-shadow: 3px 3px 11px #777777; padding-bottom:7%;background-color:white">
        
      </table>
    
      
   
   
      
  </div>

  </div>
      </div>
      </div>
      </div>
      </div>
      </div>
   </form>
</body>
    </html>
    
<?php
include("footer.php");
?>