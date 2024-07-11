<?php

ob_start();
session_start();
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery";



$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

class Product {
    public $name;
    public $price;
    public $size;

    public function __construct($name, $price, $size) {
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
    }
    public function displayProduct() {
      return "Name: {$this->name}, Price: ₹{$this->price}, Quantity: {$this->size}";
    }
}
$products = $_SESSION['cart'];
$sum = 0;
foreach ($products as $product) {
    $sum = $sum+ $product->price;
   //$stmt = $conn->prepare("INSERT INTO cart_items (product_name, product_price, product_size) VALUES (?, ?, ?)");
   // $stmt->bind_param("sss", $product_name, $product_price, $product_size);  
}
 //$sql="INSERT INTO order1 (order_id, customer_id, final amount, Address, delivery date, delivery time, order date, status) VALUES(1,1,'$sum',)"
// $stmt = $conn->prepare("INSERT INTO cart_items (product_name, product_price, product_size) VALUES (?, ?, ?)");
// $stmt->bind_param("sss", $product_name, $product_price, $product_size);
// foreach ($products as $product) {
//   $stmt = $conn->prepare("INSERT INTO cart_items (product_name, product_price, product_size) VALUES (?, ?, ?)");
//   $stmt->bind_param("sss", $product_name, $product_price, $product_size);  
// }
// $stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Summary</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .total-sum {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .place-order-btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        .order-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .order-form input {
            margin-bottom: 10px;
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="total-sum">Total: ₹<?php echo $sum; ?></div>
        <form class="order-form" id="orderForm" action="placeorder.php" method="post">
            <input type="text" name="address" placeholder="Enter your address" required>
            <input type="date" name="delivery_date" required>
            <input type="time" name="delivery_time" required>
            <input type="hidden" name="total_amount" value="<?php echo $sum; ?>">
            <button type="submit" class="place-order-btn">Place Order</button>
        </form>
    </div>
</body>
</html>