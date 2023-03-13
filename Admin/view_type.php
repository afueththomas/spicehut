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
<form action="reg_type.php" method="post">

  <div class="container" style="width:100%;margin-left:200px;margin-bottom: 10%;padding-top:7%;" >
  
  <div class="row">
  <div class="col-md-9" style="box-shadow: 2px 2px 10px #000000; border-radius:0px; top: 14px; ">
  <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;">
      <input type="submit" name="addnew" value="AddNew" class="btn btn-primary" style="margin-left:63%">
    </div>
  <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">TYPE DETAILS</h2>
  <div class="form-horizontal" style="margin-left:0px;">
  <table class="table table-hover" style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:7%">
  
    <th> #</th>
    
    <th>Type </th>
    <th>Description</th>
    <th style="type">Edit</th>
    <th style="type">Delete</th>
    <?php
include("config.php");
$s=1;
$sql=mysqli_query($con,"SELECT * FROM tbl_type");
   while($display=mysqli_fetch_array($sql))
   {
	echo "<tr>";
	echo "<td>".$s++."</td>";
	echo "<td>".$display["type"]."</td>";
	echo "<td>".$display["Description"]."</td>";
	echo "<td><a style='color:#090' href='edit_type.php?type_id=".$display['type_id']."'>Edit</a> </td>";
	echo "<td><a style='color:#090' href='delete_type.php?type_id=".$display['type_id']."'>Delete</a> </td>";
	echo "</tr>";
	
  }
echo "</table>";

?>
  </div>
  </div>
  <div> </div>
  </div>
  </div>  </div>
</form>
</body>
</html>
<?php
// include("footer.php");
?>