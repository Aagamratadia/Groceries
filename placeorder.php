<?php

ob_start();
session_start();
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ayaan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    $address = $_POST['address'];
    $delivery_date = $_POST['delivery_date'];
    $delivery_time = $_POST['delivery_time'];
    $total_amount = $_POST['total_amount'];
    class Product {
        public $name;
        public $price;
        public $size;
        public $Iid;
    
        public function __construct($name, $price, $size, $Iid) {
            $this->name = $name;
            $this->price = $price;
            $this->size = $size;
            $this->Iid = $Iid;
        }
        public function displayProduct() {
            return "Name: {$this->name}, Price: ₹{$this->price}, Quantity: {$this->size}, Id: {$this->Iid}";
        }
    }
    $products = $_SESSION['cart'];


    if (!isset($_SESSION['id'])) {
        die("User not logged in.");
    }

    $customer_id = $_SESSION['id'];
    $status = 'Open';
    $fn = $_SESSION['first_name'];
    $ln = $_SESSION['user_name'];
    $pn = $_SESSION['user_phone'];
    $Itemid=1;
    $discount = 0.1;
    $final_amount = $total_amount - ($total_amount * $discount);
    if (isset($_SESSION['cart'])) {
        $products = $_SESSION['cart'];
    } else {
        $products = [];
    }
    $sql = "SELECT max(order_id) as m FROM orders";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $oid = $row['m'];
        }
    }
    if ($oid == NULL)
        $oid = 1;
    else
        $oid += 1;

    // $sql2= "SELECT vendor_id as v FROM groceries WHERE p_id=$Itemid"
    // $result2 = $conn->query($sql);
    // if ($result2->num_rows > 0) {
    //     while($row = $result2->fetch_assoc()) {
    //         $vendor_id = $row['v'];
    //     }
    // }
  
    $stmt = $conn->prepare("INSERT INTO orders (order_id, final_amount, address, delivery_date, order_date, price, discount, status) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)");

    if (!$stmt) {
        die("Prepare statement failed: " . $conn->error);
    }

    $stmt->bind_param("issssss", $oid, $final_amount, $address, $delivery_date, $total_amount, $discount, $status);

    if ($stmt->execute()) {
        // Store each product in the database
            $stmt1 = $conn->prepare("INSERT INTO order_item (order_id, vendor_id, item_id, product_name, quantity, product_price) VALUES (?, ?, ?, ?, ?, ?)");

//            echo $products;
            foreach ($products as $product) {
                echo $product->displayProduct() . "<br>";
    //            echo "hi";
               $stmt1->bind_param("isisss", $oid, $product->Iid, $Itemid, $product->name,  $product->size, $product->price);

                if (!$stmt1->execute()) {
                    echo "Error: " . $stmt->error . "<br>";
                } else {
                    echo "Product stored in the database successfully.<br>";
                }
            }
            unset($_SESSION['cart']);
        echo '<!DOCTYPE html>
              <html lang="en">
              <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Order Success</title>
                  <style>
                      .message {
                          text-align: center;
                          margin-top: 20%;
                          font-size: 32px;
                          font-weight: bold;
                      }
                  </style>
                  <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
                  <script>
                      (function() {
                          emailjs.init(""); 
                      })();

                      function sendEmail() {
                          emailjs.send("service_8bq8xjk", "template_3qcj16c", {
                              order_id: "'.$oid.'",
                              first_name: "'.$fn.'",
                              last_name: "'.$ln.'",
                              address: "'.$address.'",
                              delivery_date: "'.$delivery_date.'",
                              delivery_time: "'.$delivery_time.'",
                              total_amount: "'.$total_amount.'"
                          })
                          .then(function(response) {
                              console.log("SUCCESS!", response.status, response.text);
                          }, function(error) {
                              console.log("FAILED...", error);
                          });
                      }

                      setTimeout(function(){
                          window.location.href = "index.php";
                      }, 3000);

                      sendEmail();
                  </script>
              </head>
              <body>
                  <div class="message">Order placed successfully!</div>
              </body>
              </html>';
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt1->close();
    $stmt->close();
    $conn->close();

?>
