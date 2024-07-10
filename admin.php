<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'AllConstant.php';
$servername = SERVERNAME;
$username = USERNAME;
$password = PASSWORD;
$dbname = DBNAME;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM order1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Orders</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-sm bgc navbar-dark">
  
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="images/untitled.jpg" alt="logo" style="width:40px;">
  </a>
  
 <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact US</a>
      </li> 
       <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Products
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="achaar.php">Achaar</a>
        <a class="dropdown-item" href="papad.php">Papad</a>
        <a class="dropdown-item" href="masala.php">Masala</a>
      </div>
    </li>     
    </ul>
  </div>  
</nav>
  <section class="container mt-5">
    <h1 class="mb-4">All Orders</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Delivery Date</th>
          <th>Status</th>
          <th>Total Price</th>
          <th>Order Date</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Order_ID'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td>" . $row['Tracking_Status'] . "</td>";
                echo "<td>" . $row['Amount'] . "</td>";
                echo "<td>" . $row['order_date'] . "</td>";
                echo "<td><a href='ODdetails.php?Order_ID=" . $row['Order_ID'] . "' class='btn btn-primary'>View Details</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>You have no orders.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </section>
  <footer>
        <p>&copy; 2024. Gauri's Pickles Pvt. Ltd. All rights reserved.</p>
  </footer>
</body>

</html>
