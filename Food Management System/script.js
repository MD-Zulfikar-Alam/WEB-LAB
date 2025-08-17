let cartCount = 0;
let cartItems = {};

function addToCart(name, originalPrice, discountedPrice) {
  cartCount++;
  document.getElementById("cart-count").textContent = cartCount;

  if (cartItems[name]) {
    cartItems[name].quantity++;
    if (cartItems[name].quantity >= 5) {
      cartItems[name].discountedPrice = discountedPrice * 0.9;
    } else {
      cartItems[name].discountedPrice = discountedPrice;
    }
  } else {
    cartItems[name] = {
      originalPrice: originalPrice,
      discountedPrice: discountedPrice,
      quantity: 1,
    };
  }

  updateCartUI();
}

function updateCartUI() {
  const cartList = document.getElementById("cart-items");
  cartList.innerHTML = "";

  let total = 0;

  for (let item in cartItems) {
    let li = document.createElement("li");
    let itemTotal = cartItems[item].discountedPrice * cartItems[item].quantity;
    total += itemTotal;

    li.innerHTML = `
      <span>${item} (x${cartItems[item].quantity}) - ${itemTotal} BDT</span>
      <div>
        <button onclick="addToCart('${item}', ${cartItems[item].originalPrice}, ${cartItems[item].discountedPrice})">➕</button>
        <button onclick="removeFromCart('${item}')">❌</button>
      </div>
    `;
    cartList.appendChild(li);
  }

  document.getElementById("total-price").textContent = "Total: " + total + " BDT";
}

function removeFromCart(item) {
  if (cartItems[item]) {
    cartCount -= cartItems[item].quantity;
    delete cartItems[item];
    document.getElementById("cart-count").textContent = cartCount;
    updateCartUI();
  }
}

function toggleCart() {
  const modal = document.getElementById("cart-modal");
  modal.style.display = modal.style.display === "block" ? "none" : "block";
}

// Close modal if user clicks outside content
window.onclick = function(event) {
  const modal = document.getElementById("cart-modal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
}
