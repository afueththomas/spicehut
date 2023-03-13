<?php
include("../Guest/auth_user.php");

include('../Customer/config.php');
$login_id=$_SESSION['cus_id'];
$details=mysqli_query($con,"SELECT *FROM tbl_customer WHERE customer_id='$login_id'");
if($details)
{
$profile=mysqli_fetch_array($details);
}
?>
<html>
<html lang="zxx">
<head>
  <title>SpiceHut | Admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Yield Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
  />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>


  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

  <link href="css/font-awesome.min.css" rel="stylesheet">


  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
 
  <link href="//fonts.googleapis.com/css?family=Josefin+Sans:400,600,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Libre+Franklin:400,500" rel="stylesheet">


  <style>
    .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.nav1-2-1 {
  margin-right: 80px;
}


    </style>
</head>

<body>
  
    <!-- header -->
    <div class="headder-top d-md-flex" style="margin-top:-15px;background-color:#000000;">
      <div id="logo">
        <h1>
          <a href="index.php">SpiceHut</a>
        </h1>
      </div>
      <!-- nav -->
      <nav class="nav1-2-1" >

        <ul>
          <li >
            <a href="../Customer/index.php">Go Back</a>
            </li>
          <li>
          <a href="#"><img src="../Customer/img/avathar.png" alt="Avatar" class="avatar"></a>
          <a href="#"><?php
          echo "Hi..👋 " ;
          echo $profile['fname']; ?></a>
      </li>
      </ul>
      </div>
      <!-- //nav -->
    </div>
    <!-- //header -->
</body>
</html>