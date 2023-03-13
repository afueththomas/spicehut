<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php
include("header.php");
?>
<br>
<br>
<br>
<form>
 <?php

include("../Customer/config.php");
$amount=$_SESSION["amount"];
$cid=$_SESSION["cus_id"];

$sql=mysqli_query($con,"select * from tbl_customer where customer_id=$cid");


$row=mysqli_fetch_array($sql);
 
?>

<?php
  if(isset($_GET)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Integartion</title>
    <link rel="stylesheet" href="../Customer/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>

body {
    background-color: #f2f2f2;
}


form {
    margin: 20px;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"], input[type="email"], input[type="tel"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #3e8e41;
}


</style>


</head>
<body>
    <br>
    <br>
    <br>
<h2 style="text-align: center;">Confirm Payment</h2>

<div class="row">
    <div class="col-md-6">
        <div class="form-container">
            <form autocomplete="off" action="checkout-charge.php" method="POST">
                <div>
                <label>Customer Name</label>
                    <input type="text" name="c_name" value="<?php echo $row["fname"]; echo " "; echo $row["lname"] ?>" disable required/>
                   
                </div>
                <div>
                <label>E-Mail</label>
                    <input type="text" name="email" value="<?php echo $row["email"];?>" required/>  
                </div>
            
                <div>
                <label>Price</label>
                    <input type="text"  id ="price" name="price" value="<?php echo $amount?>" disabled required/>   
                </div>
                <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
             


</form>
<?php
}
?>

<script>
    function pay_now(){
        var name=jQuery('#c_name').val();
        var amt=jQuery('#price').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_331aZ1uEa4OmfG", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>

