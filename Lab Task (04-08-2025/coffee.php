<?php
session_start();
$username = $_SESSION["username"] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coffee Shop</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <nav class="nav">
    <div class="title">Coffee Shop</div>

    <div class="center-area">
      <?php if ($username): ?>
        <a href="#" class="account-link"><?= htmlspecialchars($username) ?></a>
      <?php else: ?>
        <a href="login.php" class="account-link">Login</a>
      <?php endif; ?>

      <div class="dropdown">
        <button class="dropbtn">Coffee Menu</button>
        <div class="dropdown-content">
          <a href="#">Hot Coffee</a>
          <a href="#">Cold Coffee</a>
          <a href="#">Specials</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn">Offers</button>
        <div class="dropdown-content">
          <a href="#">Today’s Deals</a>
          <a href="#">Happy Hour</a>
          <a href="#">Festival Offers</a>
        </div>
      </div>

      <div class="search-area">
        <input type="text" placeholder="Search Coffee..." class="search_bar">
        <button class="search">Search</button>
      </div>
    </div>

    <div class="right">
      <i class="fas fa-shopping-cart"><sub>0</sub></i>
    </div>
  </nav>

  <section class="banner">
    <button class="order-btn">Order Now</button>
  </section>

  <section class="product-section">
    <div class="product-card" data-price="180" data-discount="0.15">
      <img src="images/espresso.jpg" alt="Espresso">
      <h3>Espresso</h3>
      <p>
        <span class="original-price">BDT-180</span><br>
        <span class="discount-info"></span><br>
        <span class="discounted-price"></span>
      </p>
      <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product-card" data-price="250" data-discount="0.25">
      <img src="images/cappuccino.jpg" alt="Cappuccino">
      <h3>Cappuccino</h3>
      <p>
        <span class="original-price">BDT-250</span><br>
        <span class="discount-info"></span><br>
        <span class="discounted-price"></span>
      </p>
      <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product-card" data-price="150" data-discount="0">
      <img src="images/latte.jpg" alt="Latte">
      <h3>Latte</h3>
      <p>
        <span class="original-price">BDT-150</span><br>
        <span class="discount-info"></span><br>
        <span class="discounted-price"></span>
      </p>
      <button class="add-to-cart">Add to Cart</button>
    </div>

    <div class="product-card" data-price="300" data-discount="0.30">
      <img src="images/mocha.jpg" alt="Mocha">
      <h3>Mocha</h3>
      <p>
        <span class="original-price">BDT-300</span><br>
        <span class="discount-info"></span><br>
        <span class="discounted-price"></span>
      </p>
      <button class="add-to-cart">Add to Cart</button>
    </div>
  </section>

  <footer>
    <p>© <?= date("Y") ?> Coffee Shop — Sip, Relax, Repeat.</p>
  </footer>

  <script>
    let cartCount = 0;
    const cartSub = document.querySelector('.fa-shopping-cart sub');

    document.querySelectorAll('.product-card').forEach(card => {
      const price = parseFloat(card.dataset.price);
      const discount = parseFloat(card.dataset.discount);
      const originalElem = card.querySelector('.original-price');
      const discountInfo = card.querySelector('.discount-info');
      const discountedElem = card.querySelector('.discounted-price');

      if (discount > 0) {
        const discountPercent = Math.round(discount * 100);
        const discountedPrice = Math.round(price * (1 - discount));
        discountInfo.textContent = `Discount: ${discountPercent}% OFF`;
        discountedElem.textContent = `Now: BDT-${discountedPrice}`;
        originalElem.style.textDecoration = "line-through";
        originalElem.style.color = "#888";
        discountedElem.style.color = "#e67e22";
        discountedElem.style.fontWeight = "bold";
      }

      const addBtn = card.querySelector('.add-to-cart');
      addBtn.addEventListener('click', () => {
        cartCount++;
        cartSub.textContent = cartCount;
      });
    });
  </script>
</body>
</html>
