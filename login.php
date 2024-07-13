<?php
include 'Database.php';
 $msg = '';
 
if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) 
{
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

		$username = $_POST["username"];
		//echo "<br>" .$username;
		$password = $_POST["password"];
		$password = md5($password);
		//echo "<br>" .$password;
        $role = $_POST["role"];
        echo $role;

        if($role == "User"){
		$sql = "select user_name, id, email, first_name from user where user_name='$username' and password='$password'";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            ob_start();
            session_start();
            $_SESSION['myuser'] = $username;
            $_SESSION['cart'] = [];
            while($row = $result->fetch_assoc()) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['user_phone'] = $row['user_phone'];
            }	
            if($username == "admin"){
                header("Location: ./admin.php");
                exit();
            }
            else{
                header("Location: ./index.php");
                exit();
            }
        }else{
            $msg = 'Wrong username or password';
        }
        }elseif($role == "Vendor") {
		$sql1 = "select username, vendor_id, email, firstname from vendor where username='$username' and password='$password'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            ob_start();
            session_start();
            $_SESSION['myuser'] = $username;
            $_SESSION['cart'] = [];
            while($row1 = $result1->fetch_assoc()) {
            $_SESSION['vemail'] = $row1['email'];
            $_SESSION['vusername'] = $row1['username'];
            $_SESSION['vid'] = $row1['vendor_id'];
            $_SESSION['vfirst_name'] = $row1['firstname'];
            $_SESSION['v_phone'] = $row1['phonenumber'];
            }	
            if ($role == "Vendor") {
              header("Location: ./vendor.php");
            }
            else{
                header("Location: ./index.php");
               exit();
            }
        }
        else{
            $msg = 'Wrong username or password';
        }
        }
       $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Groceries</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<script src="bootstrap/jquery.slim.min.js"></script>
<script src="bootstrap/popper.min.js"></script>
<script src="bootstrap/bootstrap.bundle.min.js"></script><title>Login Form</title>
<script>
    function redirectToRegistration() {
        window.location.href = "regi.php"; 
    }
	function otp() {
        alert("OTP send successfully"); // Replace "registration.html" with the actual URL of your registration page
    }
	 
</script>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .login-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width:300px;
    }
    .login-form h2 {
        margin-bottom: 20px;
        text-align: center;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
    }
    .form-group select, .form-group input[type="text"], .form-group input[type="password"] {
        width: 90%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group select {
        cursor: pointer;
    }
    .form-group input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .hey{
        text-align: center;
    }
</style>
</head>
<body>
    <div class="container justify-content-center align-items-center">
      <h2 class="hey">Groceries|Login</h2>  
    <div class="login-form container container2 justify-content-center align-items-center">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role"  required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="User">User</option>
                    <option value="Vendor">Vendor</option>
                    <option  value="Admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login">
                <u><p class="form-group" onclick="otp()" align="center" style="color:red">Forgot Password</p></u>
                <u><p class="form-group" onclick="redirectToRegistration()" align="center" style="color:red"> new user regester here</p></u>
            </div>
        </form>
    </div>
    </div>

</body>
</html>

