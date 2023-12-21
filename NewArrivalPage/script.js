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

      fetch("/Watchdrit-Project-Website/NewArrivalPage/proses.php", {
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
    const cartItemElements = document.querySelectorAll(".cart-item");
    cartItemElements.forEach((cartItem) => {
      cartItems.removeChild(cartItem);
    });

    updateCartTotal();
  }

  // Additional code for submitting the form
  const purchaseForm = document.getElementById("purchase-form");
  purchaseForm.addEventListener("submit", function (event) {
    event.preventDefault();

    // Serialize the cart data
    const cartData = JSON.stringify(getCartData());

    // Add a hidden input field to the form
    const hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";
    hiddenInput.name = "cart";
    hiddenInput.value = cartData;
    purchaseForm.appendChild(hiddenInput);

    // Submit the form
    purchaseForm.submit();
  });

  function getCartData() {
    const cartItemPrices = document.querySelectorAll(".cart-item");
    const cartData = [];

    cartItemPrices.forEach((item) => {
      const itemName = item.textContent.split(" - ")[0];
      const itemPrice = parseInt(item.textContent.match(/\d+/)[0]);
      const itemId = getItemIdByName(itemName);

      cartData.push({
        id: itemId,
        name: itemName,
        price: itemPrice,
      });
    });

    return cartData;
  }

  function getItemIdByName(itemName) {
    // Implement logic to get the item ID based on the name
    // This depends on how your items are identified in the database
    // You may need to fetch this information from the server or have a mapping in the client
    // For demonstration purposes, assume there's a function getItemIdByName(itemName)
    // that returns the item ID based on the item name.
    // Example: return getItemIdByName(itemName);
  }
});
