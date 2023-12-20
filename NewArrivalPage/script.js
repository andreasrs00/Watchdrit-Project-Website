document.addEventListener("DOMContentLoaded", function () {
  const cartOverlay = document.querySelector(".cart-overlay");
  const closeCartBtn = document.querySelector(".close-cart");
  const clearCartBtn = document.querySelector(".clear-cart");
  const cartTotal = document.querySelector(".cart-total");
  const cartItems = document.querySelector(".cart-items");
  const addToCartButtons = document.querySelectorAll(".add-to-cart");

  closeCartBtn.addEventListener("click", function () {
    cartOverlay.style.display = "none";
  });

  clearCartBtn.addEventListener("click", function () {
    // Ask for confirmation before clearing the cart
    const isConfirmed = confirm("Are you sure you want to clear the cart?");
    if (isConfirmed) {
      clearCart();
    }
  });

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      const itemName = event.target.getAttribute("data-name");
      const itemPrice = event.target.getAttribute("data-price");
      const itemId = event.target.getAttribute("data-id");

      const newItem = {
        id: itemId,
        name: itemName,
        price: parseInt(itemPrice.replace(/\D/g, "")),
      };

      // Send an AJAX request to your PHP script to handle the addition to the cart
      fetch("/Watchdrit-Project-Website/purchase.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(newItem),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data); // You can handle the response from the server here
          // You may want to update the cart UI based on the server response
          // For example, you can display a success message or handle errors
        });

      addItemToCart(newItem);
    });
  });

  function addItemToCart(item) {
    const cartItem = document.createElement("div");
    cartItem.classList.add("cart-item");
    cartItem.innerHTML = `${item.name} - RP ${item.price}`;

    cartItems.appendChild(cartItem);

    updateCartTotal();
  }

  function updateCartTotal() {
    const cartItemPrices = document.querySelectorAll(".cart-item");
    let total = 0;

    cartItemPrices.forEach((item) => {
      const itemPrice = parseInt(item.textContent.match(/\d+/)[0]);
      total += itemPrice;
    });

    cartTotal.textContent = `Total: RP ${total.toLocaleString("id-ID")}`;
  }

  function clearCart() {
    // Remove all child elements representing cart items
    const cartItemElements = document.querySelectorAll(".cart-item");
    cartItemElements.forEach((cartItem) => {
      cartItems.removeChild(cartItem);
    });

    // Reset the total to zero
    updateCartTotal();
  }
});
