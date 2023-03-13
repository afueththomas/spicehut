<?php
// Get the product ID from the URL parameter
$product_id = $_GET['id'];

// Connect to the database


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query the database to retrieve the product information
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);

// If the product exists, display its information
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $product_name = $row['name'];
  $product_description = $row['description'];
  $product_price = $row['price'];
  $product_image = $row['image'];

  echo "<h1>$product_name</h1>";
  echo "<p>$product_description</p>";
  echo "<p>$product_price</p>";
  echo "<img src='$product_image'>";
} else {
  // If the product doesn't exist, display an error message
  echo "Product not found.";
}

// Close the database connection
$conn->close();
?>
