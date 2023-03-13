<?php
session_start();
include('../Customer/config.php');
$name = $_POST['c_name'];
$email = $_POST['email'];
$price = $_POST['price'];
$status = "successfull";

// Insert payment details into database
$sql = "INSERT INTO payment (cname, email, price, pstatus) VALUES ('$name', '$email', '$price', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "Payment details stored successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();

?>
