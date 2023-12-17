document.addEventListener("DOMContentLoaded", function () {
  const cartBtn = document.querySelector(".cart-btn");
  const cartOverlay = document.querySelector(".cart-overlay");
  const closeCartBtn = document.querySelector(".close-cart");
  const clearCartBtn = document.querySelector(".clear-cart");
  const cartTotal = document.querySelector(".cart-total");
  const cartItems = document.querySelector(".cart-items");
  const addToCartButtons = document.querySelectorAll(".add-to-cart");

  // Event listeners
  cartBtn.addEventListener("click", function () {
    cartOverlay.style.display = "block";
  });

  closeCartBtn.addEventListener("click", function () {
    cartOverlay.style.display = "none";
  });

  addToCartButtons.forEach((button) => {
    // Menambah event listener 'click' pada setiap tombol 'add-to-cart'
    button.addEventListener("click", function (event) {
      // Mendapatkan nama dan harga item dari atribut data pada tombol yang diklik
      const itemName = event.target.getAttribute("data-name");
      const itemPrice = event.target.getAttribute("data-price");

      // Membuat objek baru untuk item yang akan ditambahkan ke keranjang
      const newItem = {
        name: itemName,
        price: parseInt(itemPrice.replace(/\D/g, "")), // Menghapus karakter non-digit dari harga dan mengonversi menjadi angka
      };

      // Memanggil fungsi untuk menambahkan item ke dalam keranjang
      addItemToCart(newItem);
    });
  });

  // Fungsi untuk menambahkan item ke dalam keranjang
  function addItemToCart(item) {
    // Membuat elemen div untuk merepresentasikan item dalam keranjang
    const cartItem = document.createElement("div");
    cartItem.classList.add("cart-item");
    cartItem.innerHTML = "${item.name} - $${item.price}";

    // Menambah elemen item ke dalam daftar item pada keranjang
    cartItems.appendChild(cartItem);

    // Memperbarui total harga di keranjang setelah menambahkan item baru
    updateCartTotal();
  }

  // Fungsi untuk mengupdate total harga pada keranjang
  function updateCartTotal() {
    // Mengambil semua elemen dengan kelas 'cart-item'
    const cartItemPrices = document.querySelectorAll(".cart-item");
    let total = 0;

    cartItemPrices.forEach((item) => {
      // Mendapatkan harga dari teks dalam elemen dan menjumlahkannya untuk mendapatkan total harga
      const itemPrice = parseInt(item.textContent.replace(/\D/g, ""));
      total += itemPrice;
    });

    // Memperbarui teks total harga di keranjang
    cartTotal.textContent = `Total: $${total}`;
  }
});
