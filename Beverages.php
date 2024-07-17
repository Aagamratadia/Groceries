<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beverages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="bootstrap/jquery.slim.min.js"></script>
  <script src="bootstrap/popper.min.js"></script>
  <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="cart.js"></script>
</head>
<body>
<?php
  session_start();
  $isLoggedIn = isset($_SESSION['UserId']);
?>
<div class="container">
  <h1 class="text-center mt-4 mb-4">Beverages</h1>  

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">
    <img src="bird.jpg" alt="logo" style="width:40px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">How it works</a>
      </li> 
      <?php 
      if ($_SESSION['myuser'] != null) {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="profile.php">Profile</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="add_to_cart.php"><img src="cart.png" alt="cart"></a>';
        echo '</li>';
        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
        echo '<img src="icon1.png" alt="">';
        echo '</a>';
        echo '<ul class="dropdown-menu">';
        echo '<li><a class="dropdown-item" href="vieworders.php">View Orders</a></li>';
        echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
        echo '</ul>';
        echo '</li>';
      } else {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="login.php">Login</a>';
      }?> 
    </ul>
  </div>  
</nav>

  <div class="container1">
    <div class="row">
      <!-- Item 1 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage1.jpg" alt="Orange Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Orange Juice</h5>
            <p class="card-text">Freshly squeezed orange juice.</p>
            <p class="card-text"><strong>Price:</strong> ₹100 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="orange-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Orange Juice', description: 'Freshly squeezed orange juice.', price: 100, quantity: document.getElementById('orange-juice-quantity').value, image: 'beverage1.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 2 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage2.jpg" alt="Apple Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Apple Juice</h5>
            <p class="card-text">Pure and refreshing apple juice.</p>
            <p class="card-text"><strong>Price:</strong> ₹120 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="apple-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Apple Juice', description: 'Pure and refreshing apple juice.', price: 120, quantity: document.getElementById('apple-juice-quantity').value, image: 'beverage2.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 3 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage3.jpg" alt="Grape Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Grape Juice</h5>
            <p class="card-text">Sweet and refreshing grape juice.</p>
            <p class="card-text"><strong>Price:</strong> ₹130 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="grape-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Grape Juice', description: 'Sweet and refreshing grape juice.', price: 130, quantity: document.getElementById('grape-juice-quantity').value, image: 'beverage3.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 4 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage4.jpg" alt="Mango Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Mango Juice</h5>
            <p class="card-text">Sweet and tangy mango juice.</p>
            <p class="card-text"><strong>Price:</strong> ₹110 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="mango-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Mango Juice', description: 'Sweet and tangy mango juice.', price: 110, quantity: document.getElementById('mango-juice-quantity').value, image: 'beverage4.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 5 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage5.jpg" alt="Pineapple Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Pineapple Juice</h5>
            <p class="card-text">Fresh and tangy pineapple juice.</p>
            <p class="card-text"><strong>Price:</strong> ₹90 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="pineapple-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Pineapple Juice', description: 'Fresh and tangy pineapple juice.', price: 90, quantity: document.getElementById('pineapple-juice-quantity').value, image: 'beverage5.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 6 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage6.jpg" alt="Coconut Water" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Coconut Water</h5>
            <p class="card-text">Natural and hydrating coconut water.</p>
            <p class="card-text"><strong>Price:</strong> ₹50 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="coconut-water-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Coconut Water', description: 'Natural and hydrating coconut water.', price: 50, quantity: document.getElementById('coconut-water-quantity').value, image: 'beverage6.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 7 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage7.jpg" alt="Lemonade" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Lemonade</h5>
            <p class="card-text">Refreshing and tangy lemonade.</p>
            <p class="card-text"><strong>Price:</strong> ₹60 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="lemonade-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Lemonade', description: 'Refreshing and tangy lemonade.', price: 60, quantity: document.getElementById('lemonade-quantity').value, image: 'beverage7.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 8 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage8.jpg" alt="Carrot Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Carrot Juice</h5>
            <p class="card-text">Healthy and refreshing carrot juice.</p>
            <p class="card-text"><strong>Price:</strong> ₹70 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="carrot-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Carrot Juice', description: 'Healthy and refreshing carrot juice.', price: 70, quantity: document.getElementById('carrot-juice-quantity').value, image: 'beverage8.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Item 9 -->
      <div class="col-md-4 mb-4">
        <div class="card">
          <img class="card-img-top" src="beverage9.jpg" alt="Mixed Fruit Juice" style="width:100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Mixed Fruit Juice</h5>
            <p class="card-text">A delightful mix of various fruit juices.</p>
            <p class="card-text"><strong>Price:</strong> ₹140 per litre</p>
            <div class="input-group mb-3">
              <input type="number" id="mixed-fruit-juice-quantity" class="form-control" placeholder="Quantity (litres)" aria-label="Quantity" aria-describedby="basic-addon2" min="1">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" onclick="addToCart({name: 'Mixed Fruit Juice', description: 'A delightful mix of various fruit juices.', price: 140, quantity: document.getElementById('mixed-fruit-juice-quantity').value, image: 'beverage9.jpg'})">Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>

</body>
</html>
