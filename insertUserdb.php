<?php
include 'Allconstants.php';
$servername = SERVERNAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DBNAME;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	 echo "connection successful";
}

$firstname = $_POST["firstname"];
echo "<br>" .$firstname;
$lastname = $_POST["lastname"];
echo "<br>" .$lastname;
$username = $_POST["username"];
echo "<br>" .$username;
$email = $_POST["email"];
echo "<br>" .$email;
$password = $_POST["password"];
//echo "<br>" .$password;
$password = md5($password);
$confirm = $_POST["confirm"];
echo "<br>" .$confirm;
$role = $_POST["role"];
echo "<br>" .$role;
$doj = $_POST["doj"];
echo "<br>" .$doj;
$phone = $_POST["phone"];
echo "<br>" .$phone;
$emergency = $_POST["emergency"];
echo "<br>" .$emergency;
$address = $_POST["address"];
echo "<br>" .$address;
$status = $_POST["status"];
echo "<br>" .$status;
$experience = $_POST["experience"];
echo "<br>" .$experience;
$dob = $_POST["dob"];
echo "<br>" .$dob;
$comments = $_POST["comments"];
echo "<br>" .$comments;
$currdate = date("Y-m-d");
echo "<br>" .$currdate;

$sql = "INSERT INTO user(first_name, user_name, email, password, phone_no) VALUES ('$firstname','$username','$email',
'$password','$phone')";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	header("Location: ./SearchUser.php?message=true");
	exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
?>