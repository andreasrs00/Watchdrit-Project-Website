<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Watchdrit-Project-Website/collection/style.css" />
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="navbar">
        <div class="nav-container">
          <input class="checkbox" type="checkbox" name="" id="" />
          <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
          </div>
          <div class="logo"></div>
          <div class="menu-items">
            <li><a href="#">Home</a></li>
            <li>
              <a href="/Watchdrit-Project-Website/LoginPage/index.php">Login</a>
            </li>
            <li>
              <a href="/Watchdrit-Project-Website/NewArrivalPage/index.html"
                >New Arrivals</a
              >
            </li>
            <li><a href="#">Collection</a></li>
            <li><a href="#">Testimoni</a></li>
            <li><a href="#">Contact Us</a></li>
          </div>
        </div>
      </div>
    </nav>
    
    <div class="catalog">
    <?php
      include '../koneksi.php';

      $query = "SELECT * FROM produk WHERE arrival IN (0,2)";
      $execQuery = pg_query($connection, $query);

      $i = 1;

      while ($data = pg_fetch_assoc($execQuery) AND $i!=13) {
        $idProduk = $data['id_produk'];
        $namaProduk = $data['nama_produk'];
        $hargaProduk = $data['harga_produk'];
        ?>
        <div class="item">
          <img src="jam<?=$i?>.png" alt="Jam <?=$i?>">
          <h3><?=$namaProduk?></h3>
          <p>Rp<?=$hargaProduk?></p>
          <a
          href="#"
          data-name=<?=$namaProduk?>
          data-price=<?=$hargaProduk?>
          data-id=<?=$idProduk?>
          class="add-to-cart btn btn-primary">ADD TO CART</a>
          <div class="overlay">
            <img src="hoverjam<?=$i?>.png" alt="jam <?=$i?> hover">
          </div>
        </div>
        <?php
        $i++;
      }
    ?>
    </div>

    <div class="cart-overlay">
      <div class="cart">
        <span class="close-cart">&times;</span>
        <h2>Your Cart</h2>
        <form id="purchase-form" action="/Watchdrit-Project-Website/NewArrivalPage/purchase.php" method="POST">
            <div class="cart-items">
                <h3 class="cart-total"></h3>
                <button type="button" class="clear-cart">Clear Cart</button>
                <button type="submit" class="buy" id="buy-button">Buy</button>
            </div>
        </form>
      </div>
    </div>
    

      <script src="/Watchdrit-Project-Website/collection/script.js"></script>
  </body>
</html>

