<?php
session_start();
include 'Database.php';
$servername = SERVERNAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DBNAME;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    $sql = "UPDATE orders SET status='Closed' WHERE order_id='$order_id'";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "Order closed successfully";
        header("Location: vendor.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
