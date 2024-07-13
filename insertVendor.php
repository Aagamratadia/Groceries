<?php
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
} else {
    echo "Connection successful";
}

$vendorId = $_POST["vendorId"];
echo "<br>" .$vendorId;
$vendorName = $_POST["vendorName"];
echo "<br>" .$vendorName;
$vendorAddress = $_POST["vendorAddress"];
echo "<br>" .$vendorAddress;
$firstname = $_POST["firstname"];
echo "<br>" .$firstname;
$lastname = $_POST["lastname"];
echo "<br>" .$lastname;
$username = $_POST["username"];
echo "<br>" .$username;
$email = $_POST["email"];
echo "<br>" .$email;
$password = $_POST["password"];
$password = md5($password);
$confirm = $_POST["confirm"];
echo "<br>" .$confirm;
$phone = $_POST["phone"];
echo "<br>" .$phone;
$emergency = $_POST["emergency"];
echo "<br>" .$emergency;
$currdate = date("Y-m-d");
echo "<br>" .$currdate;

$sql = "INSERT INTO vendor(vendor_id, vendor_name, vendor_address, username, firstname, lastname, password, email, phonenumber, emergency_contact, created_date) VALUES ('$vendorId', '$vendorName', '$vendorAddress', '$username', '$firstname', '$lastname', '$password', '$email', '$phone', '$emergency', '$currdate')";
echo $sql;

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: ./index.php?message=true");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>
