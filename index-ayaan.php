<?php
include 'Allconstants.php';
 $msg = '';
            
if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) 
{
		$servername = SERVERNAME;
		$username = USERNAME;
		$password = PASSWORD;
		$dbname = DBNAME;
    echo "hi";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}else{
			// echo "connection successful";
		}

		$username = $_POST["username"];
		//echo "<br>" .$username;
		$password = $_POST["password"];
		$password = md5($password);
		//echo "<br>" .$password;



		$sql = "select user_id, role from user where user_name='$username' and password='$password'";
		//echo $sql;
        $result = $conn->query($sql);
		if ($result->num_rows > 0) {
				ob_start();
				session_start();
				$_SESSION['myuser'] = $username;
				while($row = $result->fetch_assoc()) {
				$_SESSION['role'] = $row['role'];
				
				}	
				header("Location: ./Home.php");
				exit();
		}else{
				$msg = 'Wrong username or password';
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
  <script src="bootstrap/bootstrap.bundle.min.js"></script>
  </head>
<body>

<div class="container">
  <h2>Groceries</h2>  

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
  <a class="navbar-brand" href="#">
    <img src="bird.jpg" alt="logo" style="width:40px;">
  </a>
  
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">How it works</a>
      </li>  
    </ul>
  </div>  
</nav>
<div class="container1">
   <h2 class="centre">Categories</h2>
  <div class="row">
    <div class="col-sm-4">
		<figure>
		<img src="fruits-and-vegetables_650x366_41486465566.jpg.webp" style="width:100%">
		<figcaption><button type="button" class="btn btn-dark btn-block">Fruits And Vegetables</button></figcaption>
		</figure>
	</div>
   <div class="col-sm-4">
		<figure>
		<img src="fruits.jpg" style="width:100%">
		<figcaption><button type="button" class="btn btn-dark btn-block">Fresh Frutis</button></figcaption>
		</figure>
	</div>
	<div class="col-sm-4">
		<figure>
		<img src="beverages.png" style="width:100%">
		<figcaption><button type="button" class="btn btn-dark btn-block">Beverages</button></figcaption>
		</figure>
	</div>	
  </div>
  <div class="row">
    <div class="col-sm-4">
		<figure>
		<img src="dairy.webp" style="width:100%">
		<figcaption><button type="button" class="btn btn-dark btn-block">Dairy Bread and Eggs</button></figcaption>
		</figure>
	</div>
   <div class="col-sm-4">
		<figure>
		<img src="munchies.png" style="width:100%">
		<figcaption><button type="button" class="btn btn-dark btn-block">Munchies</button></figcaption>
		</figure>
	</div>
	<div class="col-sm-4">
		<figure>
		<img src="srt-frozen-food-and-ice-cream-distributor-hyderabad-ice-cream-parlours-ymdxemru5t.jpg copy.png" style="width:100%">
		<figcaption><button type="button" class="btn btn-dark btn-block">Frozen Foods and Ice Creams</button></figcaption>
		</figure>
	</div>	
  </div>
</div>
</div>

</body>
</html>
