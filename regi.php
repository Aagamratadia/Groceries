<!DOCTYPE html>
<html lang="en">
<head>
  <title>Select Role</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="bootstrap/jquery.slim.min.js"></script>
  <script src="bootstrap/popper.min.js"></script>
  <script src="bootstrap/bootstrap.bundle.min.js"></script>
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
    .choice-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    .choice-container h2 {
        margin-bottom: 20px;
    }
    .choice-container .btn {
        width: 100%;
        margin: 10px 0;
    }
  </style>
</head>
<body>

<div class="choice-container">
  <h2>Select Your Role</h2>
  <a href="vendor_regi.php" class="btn btn-primary">I am a Vendor</a>
  <a href="user_regi.php" class="btn btn-secondary">I am a User</a>
</div>

</body>
</html>
